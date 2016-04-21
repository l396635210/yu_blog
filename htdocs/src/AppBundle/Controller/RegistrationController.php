<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use AppBundle\Form\RegistrationType;
class RegistrationController extends BaseController
{
    /**
     * @Route("/register", name="regist")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm( RegistrationType::class, $user);

        $form->handleRequest( $request );
        if($form->isSubmitted() && $form->isValid()){

            $userManager = $this->get('fos_user.user_manager');
            $dispatcher = $this->get('event_dispatcher');
            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
            $userManager->updateUser($user);
            
        }
        return $this->render('regist/regist.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
