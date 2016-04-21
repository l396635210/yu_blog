<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MsgController extends Controller
{
    /**
     * @Route("/msgs", name="msg_list")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('msg/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/msg/details", name="msg_details")
     */
    public function detailsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('msg/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/msg/create", name="msg_create")
     */
    public function createAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('msg/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/msg/edit", name="msg_edit")
     */
    public function editAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('msg/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
