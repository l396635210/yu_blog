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
     * @Route("/yu/cat/list", name="cat_list")
     */
    public function indexAction(Request $request)
    {
        $catRepository = $this->getDoctrine()->getRepository('AppBundle:Cat');
        $list = $catRepository->findBy(array('state'=>true));
        // replace this example code with whatever you need
        return $this->render('admin/cat/index.html.twig', [
            'list' => $list,
            'active' => 'cat_list'
        ]);
    }

    /**
     * @Route("/yu/cat/create", name="cat_create")
     */
    public function createAction( Request $request ){
        $cat = new cat();

        $form = $this->createForm( CatType::class, $cat );

        $form->handleRequest( $request );
        if( $form->isSubmitted() && $form->isValid() ){

            $cat = $form->getData();
            $cat->setCreateId(1);//用户id
            $cat->setCreateTime(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('cat_list');
        }

        return $this->render('admin/cat/create.html.twig',[
            'form' => $form->createView(),
            'active' => 'cat_create'
        ]);
    }

    /**
     * @Route("/yu/cat/delete/{id}", name="cat_delete")
     */
    public function deleteAction( Request $request , $id ){
        $em = $this->getDoctrine()->getManager();
        $cat = $this->getDoctrine()->getRepository("AppBundle:Cat")
            ->find($id);

        if( !$cat ){
            throw $this->createNotFoundException(
                '没有找到id为'.$id.'的栏目'
            );
        }

        $cat->setState( false );
        $em->flush();

        return $this->redirectToRoute('cat_list');
    }

    /**
     * @Route("/yu/cat/edit/{id}", name="cat_edit")
     */
    public function editAction( Request $request , $id){
        $catRepository = $this->getDoctrine()->getRepository("AppBundle:Cat");
        $cat = $catRepository->find($id);

        $form = $this->createForm(CatType::class, $cat);

        $form->handleRequest( $request );
        if( $form->isSubmitted() && $form->isValid() ){
            $cat = $form->getData();
            $cat->setCreateTime(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute("cat_list");
        }

        return $this->render('cat/create.html.twig',[
            'form' => $form->createView()
            ,'active' => 'admin/cat_edit'
        ]);
    }
}
