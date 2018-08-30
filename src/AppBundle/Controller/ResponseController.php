<?php
/**
 * Created by PhpStorm.
 * User: Nesrine
 * Date: 30/08/2018
 * Time: 12:17
 */

namespace AppBundle\Controller;

use AppBundle\Entity\SubmittedForm;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Form;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Question;
class ResponseController extends Controller
{

    /**
     * @Rest\Post("api/form/{id}/submit")
     */
    public function validateAction($id, Request $request)
    {
        $json = json_decode($request->getContent(false), true);
        $em = $this->getDoctrine()->getManager();
        $user_id = $json['user_id'];
        $form_id = $json['form_id'];
        $responses = $json['questionResponse'];
        $form = $this->getDoctrine()
            ->getRepository(Form::class)
            ->find($form_id);
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($user_id);
        $formSubmitTest = $em->getRepository(SubmittedForm::class)
            ->findOneBy(array('form_id'=>$form->getId(),'user_id'=>$user->getId()));
        if(!$formSubmitTest){
            return new JsonResponse('form already submitted');
        }
        foreach ($responses as $response){
            $question_id = $json['question_id'];
            $content = $json['content'];
            $question = $this->getDoctrine()
                ->getRepository(Question::class)
                ->find($question_id);
            $response = new \AppBundle\Entity\Response($content,$user,$question);
            $em->persist($response);
            $em->flush();
            $submittedForm = new SubmittedForm($form,$user,'true');
            $em->persist($submittedForm);
            $em->flush();
        }
        return new JsonResponse('form submitted');
    }
}