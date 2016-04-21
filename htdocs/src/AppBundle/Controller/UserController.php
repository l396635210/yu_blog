<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/user/list", name="user_list")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('user/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/user/details", name="user_details")
     */
    public function detailsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('user/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/user/create", name="user_create")
     */
    public function createAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('user/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/user/edit", name="user_edit")
     */
    public function editAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('user/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
