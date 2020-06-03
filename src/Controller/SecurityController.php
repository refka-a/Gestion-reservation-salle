<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
  /**
 * Redirect users after login based on the granted ROLE
 * @Route("/login/redirect", name="_login_redirect")
 */
public function loginRedirectAction(Request $request)
{


    if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
    {
        return $this->redirectToRoute('AdminInterface');
    }
    else
    {
        return $this->redirectToRoute('UserInterface');
    }
}
/**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
public function logout()
    {
        // controller can be blank: it will never be executed!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}
