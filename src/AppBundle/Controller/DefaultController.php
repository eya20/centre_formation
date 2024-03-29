<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Admin;
use AppBundle\Form\AdminType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Forms;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class DefaultController extends Controller
{
    
    /**
     * @Route("/", name="default")
     */
    public function defaultAction(Request $request)
    {
       return $this->redirect("/dashboard");
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $errors = $authenticationUtils->getLastAuthenticationError();
        $lastname = $authenticationUtils->getLastUsername();
        return $this->render('authentification/login.html.twig', array(
            'errors' => $errors,
            'userName' => $lastname
        ));
    }

    /**
     * @Route("/register", name="user_register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder)
    {

        $em = $this->getDoctrine()->getManager();
        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {


            $errors = $form->getErrors(true);
            $admin = $form->getData();
            $admin->setPassword($encoder->encodePassword($admin, $admin->getPassword()));



            $em->persist($admin);
            $em->flush();

            $this->addFlash('success', 'you have account !');

            return $this->redirectToRoute('dashbaord');
        }

        return $this->render('authentification/register.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        return $this->render('authentification/login.html.twig');
    }
}
