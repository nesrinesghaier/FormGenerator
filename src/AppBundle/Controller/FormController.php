<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Authentication\AccessToken;
use AppBundle\Entity\Form;
use AppBundle\Entity\Question;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\SerializerBundle\JMSSerializerBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use JMS\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class FormController extends Controller
{
    /**
     * @Rest\Post(path="api/form",name="form")
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $json = json_decode($request->getContent(false), true);
        $creationDate = new \DateTime();
        $form = new Form($json["title"],$json["formDescription"],$creationDate);
        $user = $em->find(User::class, $json["user_id"]);
        if (!$user) {
            return new JsonResponse('there\'s no such user in the database');
        }
        $form->setUser($user);
        $questions = $json['questions'];
        foreach ($questions as $question) {
            $quest = new Question($question['title'], $question['obligation'], $question['questionType']);
            $quest->setForm($form);
            $quest->setItems($question['items']);
            $em->persist($quest);
            $em->flush();
        }
        $em->persist($form);
        $em->flush();
        return new JsonResponse($form->getId());
    }

    /**
     * @Rest\Get("api/form",name="form")
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $forms = $em->getRepository(Form::class)->findAll();
        $stack = array();
        foreach ($forms as $form) {
            $user = $form->getUser();

            $data = array(
                'id' => $form->getId(),
                'title' => $form->getTitle(),
                'form_description' => $form->getFormDescription(),
                'creation_date' => $form->getCreationDate(),
                'last_modif_date' => ($form->getLastModifDate() != null) ? $form->getLastModifDate() : 'not yet modified',
                "user" => array(
                    "id" => $user->getId(),
                    "username" => $user->getUsername(),
                    "email" => $user->getEmail(),
                    "first_name" => $user->getFirstName(),
                    "last_name" => $user->getLastName(),
                )
            );
            array_push($stack, $data);
        }
        return new JsonResponse($stack);
    }

    /**
     * @Rest\Get("api/userForm/{id}",name="")
     */
    public function getUserFormsAction(Request $request,$id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);
        //var_dump($form);die();
        if (!$user) {
            return new JsonResponse('there\'s no such a form id in the database');
        }
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        $formsArray = array();
        $questionsArray = array();
        foreach ($user->getForms() as $form) {
            foreach ($form->getQuestions() as $question) {
                $questionsData = array(
                    'title' => $question->getTitle(),
                    'questionType' => $question->getQuestionType(),
                    'obligation' => $question->getObligation(),
                    'items' => array($question->getItems()),
                );
                array_push($questionsArray, $questionsData);
            }
            $data = array(
                'id' => $form->getId(),
                'title' => $form->getTitle(),
                'form_description' => $form->getFormDescription(),
                'creation_date' => $form->getCreationDate(),
                'last_modif_date' => ($form->getLastModifDate() != null) ? $form->getLastModifDate() : 'not yet modified',
                'questions' => $questionsArray,

            );
            array_push($formsArray, $data);
        }
        return new JsonResponse($formsArray);
    }

    /**
     * @Rest\Get("api/form/{id}")
     *
     */
    public function showFormAction(Request $request, $id)
    {
        $form = $this->getDoctrine()
            ->getRepository(Form::class)
            ->find($id);
        if (!$form) {
            return new JsonResponse('there\'s no such a form id in the database');
        }
        $user = $form->getUser();
        $questionsArray = array();
        foreach ($form->getQuestions() as $question) {
            $questionsData = array(
                'title' => $question->getTitle(),
                'questionType' => $question->getQuestionType(),
                'obligation' => $question->getObligation(),
                'items' => array($question->getItems()),
            );
            array_push($questionsArray, $questionsData);
        }
        $data = array(
            'title' => $form->getTitle(),
            'form_description' => $form->getFormDescription(),
            'creation_date' => $form->getCreationDate(),
            'last_modif_date' => ($form->getLastModifDate() != null) ? $form->getLastModifDate() : 'not yet modified',
            'questions'=> $questionsArray,
            "user" => array(
                "id" => $user->getId(),
                "username" => $user->getUsername(),
                "email" => $user->getEmail(),
                "first_name" => $user->getFirstName(),
                "last_name" => $user->getLastName(),
            )
        );
        return new Response(json_encode($data));
    }

    /**
     * @Rest\Delete("/api/form/{id}",name="form")
     *
     */
    public function deleteAction($id)
    {
        $form = $this->getDoctrine()
            ->getRepository(Form::class)
            ->find($id);
        if (!$form) {
            return new JsonResponse('there is no such a form id in the database');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($form);
        $em->flush();
        return new JsonResponse('form deleted');
    }

    /**
     * @Rest\Put("api/form/{id}")
     *
     */
    public function editAction(Request $request, $id)
    {
        $formFromDB = $this->getDoctrine()->getRepository(Form::class)->find($id);
        if (!$formFromDB) {
            return new JsonResponse('there\'s no such a form id in the database');
        }
        //return new JsonResponse($formFromDB);
        $em = $this->getDoctrine()->getManager();
        $json = json_decode($request->getContent(false), true);
        $formFromDB->setTitle($json["title"]);
        $formFromDB->setFormDescription($json["formDescription"]);
        $lastModifDate = new \DateTime();
        $formFromDB->setLastModifDate($lastModifDate);
        $em->persist($formFromDB);
        $em->flush();
        return new JsonResponse('form updated');
    }

    protected function tokenValidation(Request $request)
    {
        $token_string = substr($request->headers->get('authorization'), 7);
        $token_DB = $this->getDoctrine()->getRepository(AccessToken::class)->findOneBy(array('token' => $token_string));
        if (strcasecmp($token_string, $token_DB) != 0) {
            return false;
        } else return true;
    }

    /**
     * @Rest\Put("api/form/{id}/validate")
     */
    public function validateAction($id, Request $request)
    {
        $form = $this->getDoctrine()
            ->getRepository(Form::class)
            ->find($id);
        if (!$form) {
            return new JsonResponse('there\'s no such a form id in the database');
        }
        $em = $this->getDoctrine()->getManager();
        $formToUpdate = $this->getDoctrine()->getRepository(Form::class)->find($id);
        $json = json_decode($request->getContent(false), true);
        $formToUpdate->setTitle($json["title"]);
        $formToUpdate->setFormDescription($json["formDescription"]);
        $lastModifDate = new \DateTime();
        $formToUpdate->setLastModifDate($lastModifDate);
        $questions = $json['questions'];
        foreach ($questions as $question) {
            $quest = new Question($question['title'], $question['obligation'], $question['questionType']);
            $quest->setForm($formToUpdate);
            $quest->setItems($question['items']);
            $em->persist($quest);
            $em->flush();
        }
        $em->persist($formToUpdate);
        $em->flush();
        return new JsonResponse('form updated');
    }


}
