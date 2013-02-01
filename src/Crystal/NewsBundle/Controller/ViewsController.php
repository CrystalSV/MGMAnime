<?php

namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\ctrBreakingNews;

class ViewsController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();

    	$BkNews = $em->getRepository('CrystalBaseBundle:ctrBreakingNews')->findAll();

        return $this->render('CrystalNewsBundle:Default:index.html.twig', array('BkNews' => $BkNews));
    }
}
