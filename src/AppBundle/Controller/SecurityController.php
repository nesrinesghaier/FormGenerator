<?php


namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * Controller managing security.
 */
class SecurityController extends BaseController
{
    private $tokenManager;

    public function __construct(CsrfTokenManagerInterface $tokenManager = null)
    {
        $this->tokenManager = $tokenManager;
    }

    /**
     * @Rest\Post(path="signin")
     */
    public function loginAction(\Symfony\Component\HttpFoundation\Request $request)
    {

        /** @var $session Session */
        $session = $request->getSession();

        $authErrorKey = Security::AUTHENTICATION_ERROR;
        $lastUsernameKey = Security::LAST_USERNAME;

        if ($request->attributes->has($authErrorKey)) {
            $error = $request->attributes->get($authErrorKey);
        } elseif (null !== $session && $session->has($authErrorKey)) {
            $error = $session->get($authErrorKey);
            $session->remove($authErrorKey);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }
        $json = json_decode($request->getContent(false), true);
        $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);
        $EnteredUserName = $json['username'];
        $user = $this->getDoctrine()->getRepository('AppBundle\Entity\User')->findOneBy(array('username' => $EnteredUserName));
        if (null === $user) {
            return new Response('please register if you\'re not registered');
        }
        $oldPassword = $user->getPassword();
        $encoder = new BCryptPasswordEncoder(13);
        $password = $json["password"];
        $valid = $encoder->isPasswordValid($oldPassword, $password, '');
        if ($valid) {
            if (!$user instanceof UserInterface) {
                return new Response('not interface');;
            }
           //$jwtManager = $this->container->get('lexik_jwt_authentication.jwt_token_authenticator');
          // $token= $jwtManager->encode(['username' => $user->getUsername()]);
           // var_dump($jwtManager);die;
               //->create($user);
           /* $authenticationSuccessHandler = $this->container->get('lexik_jwt_authentication.handler.authentication_success');*/
            $serializer = $this->get('jms_serializer')->serialize($user,'json');
            $response = new Response($serializer);
            return $response;
           /* $jwtManager = $this->container->get('lexik_jwt_authentication.jwt_manager');
            return new JsonResponse(['token' => $jwtManager->create($user)]);*/
        }
        return new Response('test');
    }

    /**
     * @Rest\Post(path="/login_check")
     */
    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    /* public function logoutAction()
     {
         throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
     }*/


    /**
     * @Rest\Post(path="/signout")
     */
    public function logoutAction()
    {
        $token = $this->container->get("security.token_storage")->getToken();
        $this->tokenManager->removeToken('authenticate');
        $this->get('request')->getSession()->invalidate();

        return new Response('user logged out');
    }

}
