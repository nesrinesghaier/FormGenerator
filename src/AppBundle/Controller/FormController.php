<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Form;
use AppBundle\Entity\User;
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

class FormController extends FOSRestController
{
    /**
     * @Rest\Post(path="form/create")
     *
     */

    public function createAction(Request $request)

    {
        /*if (false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw new AccessDeniedException();
        }*/
        $em = $this->getDoctrine()->getManager();
        $json = json_decode($request->getContent(false), true);
        $title = $json["title"];
        $creationDate = $json["creationDate"];
        $lastModifDate = $json["lastModifDate"];
        $formDescription = $json["formDescription"];
        $creationDate = new \DateTime($creationDate);
        $lastModifDate = new \DateTime($lastModifDate);
        $form = new Form($title, $formDescription, $creationDate, $lastModifDate);
        $form->setUser($em->find('AppBundle\Entity\User', $json["user_id"]));
        print_r(json_encode($form));
        $em->persist($form);
        $em->flush();
        $response = $this->forward('AppBundle\Controller\FormController:listAction');
        return $response;
    }

    /**
     * @Rest\Get("/form",name="form_list")
     *
     */
    public function listAction()
    {
        /*if (false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
          throw new AccessDeniedException();
      }*/
        $em = $this->getDoctrine()->getManager();
        $forms = $em->getRepository('AppBundle:Form')->findAll();
        $serializer = $this->get('jms_serializer')->serialize($forms, 'json');
        $response = new Response($serializer);
        return $response;
    }

    /**
     * @Rest\Get("form/{id}")
     *
     */
    public function showFormAction($id)
    {
        /*if (false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
          throw new AccessDeniedException();
      }*/
        $form = $this->getDoctrine()
            ->getRepository("AppBundle\\Entity\\Form")
            ->find($id);
        $user=$form->getUser();

        $data = array(
            'title' => $form->getTitle(),
            'form_description'=>$form->getFormDescription(),
            'creation_date'=>$form->getCreationDate(),
            'last_modif_date'=>$form->getLastModifDate(),
            "user"=>array(
                "id"=>$user->getId(),
                "username"=>$user->getUsername(),
                "email"=> $user->getEmail(),
                "first_name"=>$user->getFirstName(),
                "last_name"=>$user->getLastName(),
            )
        );
        return new Response(json_encode($data));
    }
    /**
     * @Rest\Delete("form/{id}")
     *
     */
    public function  deleteAction($id){
        $form = $this->getDoctrine()
            ->getRepository("AppBundle\\Entity\\Form")
            ->find($id);
        if (!$form) {
            return new Response('there\'s no such a form id in the database');
        }
        $em=$this->getDoctrine()->getManager();
        $em->remove($form);
        $em->flush();
        return new Response('form deleted');
    }

     /**
     * @Rest\Put("form/{id}")
     *
     */
    /*s public function  editAction(Request $request,$id){
         $formFromDB = $this->getDoctrine()->getRepository("AppBundle\\Entity\\Form")->find($id);
         if (null===$formFromDB) {
             return new Response('there\'s no such a form id in the database');
         }
         //return new JsonResponse($formFromDB);
         $em = $this->getDoctrine()->getManager();
         $json = json_decode($request->getContent(false), true);
         $formFromDB->setTitle($json["title"]);
         $formFromDB->setFormDescription($json["formDescription"]);
         $creationDate = $json["creationDate"];
         $lastModifDate = $json["lastModifDate"];
         $creationDate = new \DateTime($creationDate);
         $lastModifDate = new \DateTime($lastModifDate);
         $formFromDB->setCreationDate($creationDate);
         $formFromDB->setLastModifDate($lastModifDate);
         $em->persist($formFromDB);
         $em->flush();
         return new Response('form updated');
     }*/
}
