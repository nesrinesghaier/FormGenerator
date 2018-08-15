<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     * @Rest\Get(path="/user")
     */
    public function indexAction()
    {
        /*if (false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
          throw new AccessDeniedException();
      }*/
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();
        $serializer = $this->get('jms_serializer')->serialize($users, 'json');
        $response = new Response($serializer);
        return $response;
    }

    /**
     * Finds and displays a user entity.
     *
     * @Rest\Get(path="/user/{id}")
     *
     */
    public function showAction(User $user)
    {
        /*if (false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
          throw new AccessDeniedException();
      }*/
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->find($user->getId());
        $data = array(
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
        );
        return new Response(json_encode($data));

    }

    /**
     * @Rest\Post("/test")
     *
     */
    public function testAction(Request $request)
    {
        return new Response('test succeeded');
    }
}
