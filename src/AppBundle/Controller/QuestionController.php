<?php
/**
 * Created by PhpStorm.
 * User: Nesrine
 * Date: 23/08/2018
 * Time: 14:32
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Form;
use AppBundle\Entity\Question;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;

class QuestionController extends Controller
{

    /**
     * @Rest\Post(path="api/question",name="_question")
     *
     */

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $json = json_decode($request->getContent(false), true);
        $title = $json["title"];
        $obligation = $json["obligation"];
        $questionType = $json["questionType"];
        $items = $json["items"];
        $form_id = $json["form_id"];
        $question = new Question($title, $obligation, $questionType);
        $question->setItems($items);
        $form = $em->find(Form::class, $form_id);
        $question->setForm($form);
        $em->persist($question);
        $em->flush();
        return new JsonResponse('new question created');
    }


    /**
     * @Rest\Get("api/question",name="_questions")
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $questions = $em->getRepository(Question::class)->findAll();
        $stack = array();
        foreach ($questions as $question) {
            $form = $question->getForm();
            $data = array(
                'id' => $question->getId(),
                'title' => $question->getTitle(),
                'condition' => $question->getObligation(),
                'questionType' => $question->getQuestionType(),
                'items' => $question->getItems(),
                "form" => array(
                    "id" => $form->getId(),
                    "title" => $form->getTitle()
                )
            );
            array_push($stack, $data);
        }
        return new JsonResponse($stack);
    }

    /**
     * @Rest\Get("api/formQuestions/{id}",name="form_question_list")
     */
    public function formQuestionsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $em->getRepository(Form::class)->find($id);
        $stack = array();
        foreach ($form->getQuestions() as $question) {
            $data = array(
                'id' => $question->getId(),
                'title' => $question->getTitle(),
                'obligation' => $question->getObligation(),
                'items' => $question->getItems(),
                'questionType' => $question->getQuestionType(),
            );
            array_push($stack, $data);
        }
        return new JsonResponse($stack);
    }


    /**
     * @Rest\Get("api/question/{id}")
     *
     */
    public function showAction(Request $request, $id)
    {
        $question = $this->getDoctrine()
            ->getRepository(Question::class)
            ->find($id);
        $form = $question->getForm();

        $data = array(
            'id' => $question->getId(),
            'title' => $question->getTitle(),
            'obligation' => $question->getObligation(),
            'questionType' => $question->getQuestionType(),
            'items' => $question->getItems(),
            'formId'=>$question->getForm()->getId(),
        );
        return new Response(json_encode($data));
    }


    /**
     * @Rest\Delete("/api/question/{id}")
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $question = $this->getDoctrine()
            ->getRepository(Question::class)
            ->find($id);
        if (!$question) {
            return new JsonResponse('there\'s no such a question in this form');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($question);
        $em->flush();
        return new JsonResponse('question deleted');
    }

    /**
     * @Rest\Put("api/question/{id}")
     *
     */
    public function editAction(Request $request, $id)
    {
        $questionFromDB = $this->getDoctrine()->getRepository(Question::class)->find($id);
        if (null === $questionFromDB) {
            return new JsonResponse('there\'s no such a question in this forms');
        }
        $em = $this->getDoctrine()->getManager();
        $json = json_decode($request->getContent(false), true);
        $questionFromDB = new Question();
        $questionFromDB->setTitle($json["title"]);
        $questionFromDB->setObligation($json["obligation"]);
        $questionFromDB->setQuestionType($json["questionType"]);
        $questionFromDB->setItems($json["items"]);
        $em->persist($questionFromDB);
        $em->flush();
        return new JsonResponse('question updated');
    }

}