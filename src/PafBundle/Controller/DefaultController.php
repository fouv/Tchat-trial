<?php

namespace PafBundle\Controller;

use PafBundle\Form\IndexForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function LoginAction(Request $request)
    {


        $session = $request->getSession();

        $formIndex = $this->createForm(IndexForm::class);
        $formIndex->handleRequest($request);
        if ($formIndex->isSubmitted() && $formIndex->isValid()) {
            $data = $formIndex->getData();
            $session->set('name', $data['name']);
            $session->getFlashBag()->add('success', 'Bienvenue '.$data['name'].' sur PAFLeChat !');

            $url = $this->generateUrl('chat');
            return $this->redirect($url);
        }

        return $this->render('PafBundle:Default:index.html.twig', array(
            'formIndex' => $formIndex->createView(),
        ));
    }
}

