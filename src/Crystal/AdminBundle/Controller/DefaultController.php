<?php

namespace Crystal\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CrystalAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
