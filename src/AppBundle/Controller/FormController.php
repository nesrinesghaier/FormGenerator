<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Form;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FormController extends FOSRestController
{
    /**
     * @Rest\Post(path="/form/create")
     *
     */

    public function createAction(Request $request)

    {
        $title = json_decode($request->getContent(false), true)["title"];
        $formDescription = json_decode($request->getContent(false), true)["formDescription"];
        $creationDate = json_decode($request->getContent(false), true)["creationDate"];
        $creationDate = new \DateTime($creationDate);
        $lastModifDate = json_decode($request->getContent(false), true)["lastModifDate"];
        $lastModifDate = new \DateTime($lastModifDate);
        $form = new Form($title, $formDescription, $creationDate, $lastModifDate);
        print_r(json_encode($form));
        $em = $this->getDoctrine()->getManager();
        $em->persist($form);
        $em->flush();
        $response  = $this->redirectToRoute('form_list');
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
}
