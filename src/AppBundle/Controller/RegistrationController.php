<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\HttpFoundation\Session\Session;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;
class RegistrationController extends BaseController
{

    /**
     * @Rest\Post(path="signup")
     */
    public function registerAction(Request $request)
    {
        $userManager = $this->get('fos_user.user_manager');
        $em = $this->getDoctrine()->getManager();
        $user = $userManager->createUser();
        $user->setEnabled(true);
        $json = json_decode($request->getContent(false), true);
        $user->setFirstName($json["first_name"]);
        $user->setLastName($json["last_name"]);
        $user->setUsername($json["username"]);
        $user->setUsernameCanonical($json["username"]);
        $user->setEmail($json["email"]);
        $user->setEmailCanonical($json["email"]);
        $password = $json["password"];
        if (($password != null) and ($password != "")) {
            $encoder = new BCryptPasswordEncoder(13);
            $passwordHash = $encoder->encodePassword($password, '');
            $user->setPassword($passwordHash);
        }
        $user->setUsernameCanonical($user->getUsername());
        $user->setEmailCanonical($user->getEmail());
        $user->setEnabled(true);
        print_r($em->find('AppBundle\Entity\User', $json["username"]));
        if ($em->find('AppBundle\Entity\User', $json["username"]) != null) {
            return new JsonResponse('contains same username');
        }
        try {
            $userManager->updateUser($user);
        } catch (\Exception $e) {
            return new JsonResponse('please check your email or your username');
        }
        $response = $this->forward('AppBundle\Controller\UserController:indexAction');
        return $response;
    }
}