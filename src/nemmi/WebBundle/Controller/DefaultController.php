<?php

namespace nemmi\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use nemmi\WebBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('nemmiWebBundle:Default:index.html.twig', array('name' => $name));
    }
}
