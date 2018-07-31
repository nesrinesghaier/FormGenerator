<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Form;
use FOS\RestBundle\Controller\FOSRestController;
use JMS\SerializerBundle\JMSSerializerBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use JMS\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
class FormController extends FOSRestController
{
	/**
	 * @Rest\Post(path="/form/create")
	 */

	public function createAction(Request $request)

	{
		//$data = json_decode($request->getContent(), true);
		$data = json_encode($request->getContent(), true);
		$phpForm = $this->createForm('AppBundle\Form\FormType', new Form());
		$phpForm->submit($data);
		$creationDate = json_decode($request->getContent(false), true)["creationDate"];
		$creationDate = new \DateTime($creationDate);
		$fourma = new Form(1, "test1", "test2", $creationDate, $creationDate);
		$phpForm->handleRequest($request);
		if ($phpForm->isSubmitted()) {
			print_r($request->getContent());
			print_r("\n");
			$em = $this->getDoctrine()->getManager();
			$em->persist($fourma);
			$em->flush();
			return new Response('it worked posting ');
		}
		return new Response("\n" . 'not a valid post');
	}

	/**
	 * @Rest\Get("/form")
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
