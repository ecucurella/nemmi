<?php

namespace nemmi\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use nemmi\WebBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('nemmiWebBundle:Default:index.html.twig', array('name' => $name));


        $user = new User();
        $user->setName('Bob');
        $user->setEmail('bob@tv3.cat');
        $user->setPassword(1234);
        $user->setLocality('Barcelona');

        $em = $this->getDoctrine();
        $em->persist($user);
        $em->flush();


    }
}
