<?php
namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\catNews;

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
			
			
			$em->persist($news);
			$em->flush();
				
			return $this->redirect($this->generateURL('Index'));


		}
		else
		{
			return $this->render('CrystalNewsBundle:News:createNews.html.twig', array('news' => $news));
		}
	}

}

?>