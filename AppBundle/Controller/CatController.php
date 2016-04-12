<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Cat;

use AppBundle\Form\CatType;
class CatController extends Controller
{
    /**
     * @Route("/cat/list", name="cat_list")
     */
    public function indexAction(Request $request)
    {
        $catRepository = $this->getDoctrine()->getRepository('AppBundle:Cat');
        $list = $catRepository->findAll();
        // replace this example code with whatever you need
        return $this->render('cat/index.html.twig', [
            'list' => $list,
            'active' => 'cat_list'
        ]);
    }

    /**
     * @Route("/cat/create", name="cat_create")
     */
    public function createAction( Request $request ){
        $cat = new cat();

        $form = $this->createForm( CatType::class, $cat );

        $form->handleRequest( $request );
         if( $form->isSubmitted() && $form->isValid() ){

            $cat = $form->getData();
            $cat->setArtCnt(0);
            $cat->setCreateId(1);
            $cat->setCreateTime(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('cat_list');
         }

        return $this->render('cat/create.html.twig',[
                'form' => $form->createView(),
                'active' => 'cat_create'
            ]);
    }

    /**
     * @Route("/cat/details", name="cat_details")
     */
    public function detailsAction( Request $request ){

    }

    /**
     * @Route("/cat/edit", name="cat_edit")
     */
    public function editAction( Request $request ){

    }
}
