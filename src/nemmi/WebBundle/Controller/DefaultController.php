<?php

namespace nemmi\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use nemmi\WebBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $concerts = $this->getDoctrine()->getRepository('nemmiWebBundle:Concert')->findBy(array(), array('time' =>  'asc'));

        return $this->render('nemmiWebBundle:Default:index.html.twig', array('concerts' => $concerts));
    }
}
