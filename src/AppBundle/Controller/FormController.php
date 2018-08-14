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

class FormController extends FOSRestController
{
    /**
     * @Rest\Post(path="form/create")
     *
     */

    public function createAction(Request $request)

    {
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
}
