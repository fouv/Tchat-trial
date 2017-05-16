<?php
namespace PafBundle\Controller;


use PafBundle\Form\ChatForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use PafBundle\Entity\Chat;
use Symfony\Component\HttpFoundation\Session\Session;


class ChatController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/chat", name="chat")
     */
    public function indexAction(Request $request)
    {


        $session = $request->getSession();
        $name = $session->get('name');

        $chats = $this->getDoctrine()->getRepository('PafBundle:Chat')->findAll();

        $chat = new Chat();
        $formChat = $this->createForm(ChatForm::class, $chat);
        $formChat->handleRequest($request);
        if ($formChat->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chat);
            $em->flush();

            $url = $this->generateUrl('chat');
            return $this->redirect($url);
        }

        return $this->render('@Paf/Default/chat.html.twig', array(
            'name' => $name,
            'formChat' => $formChat->createView(),
        ));
    }
}
