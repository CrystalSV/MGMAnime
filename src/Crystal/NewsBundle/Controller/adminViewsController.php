<?php

namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class adminViewsController extends Controller
{
    public function indexAction()
    {
        return $this->render('CrystalNewsBundle:Admin:login.html.twig');
    }
}

?>