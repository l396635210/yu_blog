<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post;
use AppBundle\Entity\Todo;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends Controller
{
    /**
     * @Route("/todos", name="todo_list")
     */
    public function indexAction(Request $request, $limit = Post::NUM_ITEMS)
    {
        $session = $request->getSession();

        $session->set('foo', 'bar');
        

        $foobar = $session->get('foobar');

        $filters = $session->get('filters', array());
        // replace this example code with whatever you need
        return $this->render('todo/index.html.twig', [
            'post'=>new Post(),
        ]);
    }

    /**
     * @Route("/todo/create", name="todo_create")
     */
    public function createAction(Request $request)
    {
        $todo = new Todo();
        $todo->setName('testName');
        $todo->setContent('testContent');
        $todo->setCreateId(1);
        $todo->setCreateTime(new \DateTime('now'));
        $todo->setState(true);


        $em = $this->getDoctrine()->getManager();

        //告诉Doctrine想要保存$todo（没有提交）
        $em->persist( $todo );
        //实际提交（这里是insert）
        $em->flush();

        return new Response('insert成功,插入的id是'.$todo->getId());
    }

    /**
     * @Route("todo/details/{id}", name="todo_details")
     */
    public function detailsAction($id)
    {
        $todoRespository = $this->getDoctrine()->getRepository('AppBundle:Todo');

        $todo = $todoRespository->find($id);

        $todo = $todoRespository->findOneByName($todo->getName());

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                'SELECT p
                FROM AppBundle:Todo p 
                WHERE p.createTime < :now 
                ORDER BY p.id DESC'
            )->setParameter('now', new \DateTime('now'));

        $res = $query->getResult();
        var_dump($res);die;

        // replace this example code with whatever you need
        return $this->render('todo/details.html.twig', [
            'todo' => $todo,
        ]);
    }

    /**
     * @Route("todo/edit", name="todo_edit")
     */
    public function editAction(Request $request)
    {
        $session = $request->getSession();

        $session->set('foo', 'bar');

        $foobar = $session->get('foobar');

        $filters = $session->get('filters', array());
        // replace this example code with whatever you need
        return $this->render('todo/edit.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    
      /**
     * @Route("todo/delete", name="todo_delete")
     */
    public function deleteAction(Request $request)
    {
        $session = $request->getSession();

        $session->set('foo', 'bar');

        $foobar = $session->get('foobar');

        $filters = $session->get('filters', array());
        // replace this example code with whatever you need
        return $this->render('todo/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    } 
}
