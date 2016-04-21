<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LikeNoController extends Controller
{
    /**
     * @Route("/likes", name="likeNo_list")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('likeNo/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/like/details", name="likeNo_details")
     */
    public function detailsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('likeNo/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/like/create", name="likeNo_create")
     */
    public function createAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('likeNo/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/like/edit", name="likeNo_edit")
     */
    public function editAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('likeNo/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
}
