<?php

namespace Crystal\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class adminViewsController extends Controller
{
    public function indexAction()
    {
        return $this->render('CrystalAdminBundle:Admin:login.html.twig');
    }
}

?>