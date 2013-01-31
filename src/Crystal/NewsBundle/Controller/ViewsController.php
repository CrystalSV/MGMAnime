<?php

namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewsController extends Controller
{
    public function indexAction()
    {
        return $this->render('CrystalNewsBundle:Default:index.html.twig', array('' => ''));
    }
}
