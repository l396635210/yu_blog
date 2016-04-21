<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Art;
use AppBundle\Form\ArtType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Validator\Constraints\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class ArtController extends Controller
{
    /**
     * @Route("/yu/art/list", name="art_list")
     */
    public function indexAction(Request $request)
    {
        $artRepository = $this->getDoctrine()->getRepository("AppBundle:Art");
        $list = $artRepository->findByPage($this->get('knp_paginator'), $request);
        // replace this example code with whatever you need
        return $this->render('admin/art/index.html.twig', [
            'list'     => $list,
            'active'   => $request->get('_route')
        ]);
    }

    /**
     * @Route("/yu/art/details/{id}", name="art_details")
     */
    public function detailsAction(Request $request, $id)
    {
        $artRespository = $this->getDoctrine()->getRepository("AppBundle:Art");
        $art = $artRespository->find($id);

        $art->setContent(stream_get_contents($art->getContent()));
        // replace this example code with whatever you need
        return $this->render('admin/art/details.html.twig', [
            'art' => $art,
            'active' => ""
        ]);
    }

    /**
     * @Route("/yu/art/create", name="art_create")
     */
    public function createAction(Request $request)
    {
        $art = new Art();
        $form = $this->createForm( ArtType::class, $art );

        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid() ){

            $art = $form->getData();
            $art->setCreateId( $this->getUser()->getId() );
            $art->setLikeNo(0);
            $art->setTags('');
            $art->setCreateTime( new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist( $art );
            $em->flush();
            return $this->redirectToRoute('art_list');
        }
        // replace this example code with whatever you need
        return $this->render('admin/art/create.html.twig', [
            'form'      => $form->createView(),
            'active'    => $request->get('_route')
        ]);
    }

    /**
     * @Route("/yu/art/edit/{id}", name="art_edit")
     */
    public function editAction(Request $request, $id)
    {
        $artRepository = $this->getDoctrine()->getRepository("AppBundle:Art");
        $art = $artRepository->find($id);
        $art->setContent( stream_get_contents ($art->getContent()) );

        $form = $this->createForm( ArtType::class, $art );

        $form->handleRequest( $request );

        if( $form->isSubmitted() && $form->isValid() ){

            $post = $request->request->get('art');
            $art->setTitle( $post['title'] );
            $art->setContent( $post['content'] );

            $em = $this->getDoctrine()->getManager();
            $em -> flush();
            $this->redirectToRoute('art_list');
        }
        // replace this example code with whatever you need
        return $this->render('admin/art/create.html.twig', [
            'form' => $form->createView(),
            'active' => '',
        ]);
    }

    /**
     * @Route("/yu/art/delete/{id}", name="art_delete")
     */
    public function deleteAction(Request $request, $id){
        // replace this example code with whatever you need
        return $this->render('admin/art/details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/home/arts", name="home_artList")
     */
    public function homeIndexAction(Request $request){
        $artRepository = $this->getDoctrine()->getRepository("AppBundle:Art");
        $list = $artRepository->findByPage($this->get('knp_paginator'), $request);
        // replace this example code with whatever you need
        return $this->render('index/art/index.html.twig', [
            'list'     => $list,
        ]);
    }

    /**
     * @Route("/home/art/{id}", name="home_art")
     */
    public function homeDetailsAction(Request $request, $id)
    {
        $artRespository = $this->getDoctrine()->getRepository("AppBundle:Art");
        $art = $artRespository->find($id);

        $art->setContent(stream_get_contents($art->getContent()));
        // replace this example code with whatever you need
        return $this->render('index/art/single.html.twig', [
            'art' => $art,
        ]);
    }
}
