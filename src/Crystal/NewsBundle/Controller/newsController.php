<?php
namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\catNews;
use Crystal\BaseBundle\Entity\catCategories;

class newsController extends Controller
{
	public function addAction()
	{
		$news = new catNews();

		$em = $this->getDoctrine()->getEntityManager();
		$request = $this->getRequest();

		if ($request->getMethod() == 'POST') 
		{

			$_POST = $request->request;

			$news->setContent($_POST->get('txtContent'));
			$news->setDate($_POST->get('txtDate'));
			$news->setKeywords($_POST->get('txtKeywords'));

			$category = $em->getRepository('CrystalBaseBundle:catCategories')->find($_POST->get('txtId'));
			$news->setidCategory($category);
			
			$em->persist($news);
			$em->flush();
				
			return $this->redirect($this->generateURL('Index'));


		}
		else
		{
			$category = $em->getRepository('CrystalBaseBundle:catCategories')->findAll();
			return $this->render('CrystalNewsBundle:News:createNews.html.twig', array('category' => $category));
		}
	}

}

?>