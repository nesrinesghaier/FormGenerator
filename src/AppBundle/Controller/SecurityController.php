<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Authentication\AccessToken;
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
    public function loginAction(Request $request)
    {
        $json = json_decode($request->getContent(false), true);
        $EnteredUserName = $json['username'];
        $username = json_decode($request->getContent(false), true)['username'];
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(array('username' => $username));
        if (null === $user) {
            return new Response('please register if you\'re not registered');
        }
        $oldPassword = $user->getPassword();
        $encoder = new BCryptPasswordEncoder(13);
        $password = $json["password"];
        $valid = $encoder->isPasswordValid($oldPassword, $password, '');
        if ($valid) {
            $token = $this->getAuth2Token($user, $request);
            $user = $this->getDoctrine()->getRepository(AccessToken::class)->findOneBy(array('token' => $token))->getUser()->getId();
        }
        return new JsonResponse(array('token' => $token, 'user_id' => $user));
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


    protected function getAuth2Token(User $user, Request $request)
    {
        $request2 = new Request();
        $request2->query->add([
            'client_id' => $this->getParameter('oauth2_client_id'),
            'client_secret' => $this->getParameter('oauth2_client_secret'),
            'grant_type' => 'password',
            'username' => $user->getUsername(),
            'password' => $request->get('password')
        ]);

        try {
            return array_merge(
                json_decode(
                    $this
                        ->get('fos_oauth_server.server')
                        ->grantAccessToken($request2)
                        ->getContent(), true)
            );
        } catch (OAuth2ServerException $e) {
            return $e->getHttpResponse();
        }
    }

}
