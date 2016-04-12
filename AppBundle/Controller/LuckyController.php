<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = rand(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
    * @Route("api/lucky/number")
    */
    public function apiNumberAction(){
        $data = array("number"=>rand(1,100));
        return new JsonResponse($data);
    }

    /**
    * @Route("/lucky/numberlist/{count}")
    */
    public function numberListAction( $count ){
        $numberList = array();
        for($i=0; $i<$count; $i++){
            $numberList[] = rand(1,100);
        }

        $numbers = implode(",", $numberList);

        return $this->render(
                'lucky/numberlist.html.twig',
                array('numbers'=>$numbers)
            );

/*
        $this->container->get('template')->render(
                'lucky/numberlist.html.twig',
                array('numbers'=>$numbers)
            );
        return new Response($html);
*/        
    }
}