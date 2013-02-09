<?php

namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\ctrBreakingNews;
use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\DoctrineOrmAdapter;

class ViewsController extends Controller
{
    public function indexAction($page)
    {
    	$em = $this->getDoctrine()->getEntityManager();

    	$BkNews = $em->getRepository('CrystalBaseBundle:ctrBreakingNews')->findAll();

        $qb = $em->getRepository('CrystalBaseBundle:catNews')->createQueryBuilder('m');
        $adapter = new DoctrineOrmAdapter($qb);
        $pager = new Pager($adapter, array('page' => $page, 'limit' => 10));

        return $this->render('CrystalNewsBundle:Default:index.html.twig', array('BkNews' => $BkNews, 'pager' => $pager));
    }
    
}
