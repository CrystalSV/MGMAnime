<?php
namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\catNews;
use Crystal\BaseBundle\Entity\catCategories;

class newsController extends Controller
{

    public function listAction()
	{
		$new = new catNews();
	   	$em = $this->getDoctrine()->getEntityManager();
		$new = $em->getRepository('CrystalBaseBundle:catNews')->findAll();
		$category = $em->getRepository('CrystalBaseBundle:catCategories')->findAll();
		return $this->render('CrystalNewsBundle:News:listNews.html.twig', array('new' => $new, 'category' => $category));
	}

	public function addAction()
	{
		$news = new catNews();
		$request = $this->getRequest();
		$category = new catCategories();
		$em = $this->getDoctrine()->getEntityManager();

		if ($request->getMethod() == 'POST') 
		{

			$_POST = $request->request;
			$category = $em->getRepository('CrystalBaseBundle:catCategories')->find($_POST->get('txtCategory'));

			$news->setContent($_POST->get('txtContent'));
			$news->setDate($_POST->get('txtDate'));
			$news->setKeywords($_POST->get('txtKeywords'));
			$news->setidCategory($category);
			
			
			$em->persist($news);
			$em->flush();
				
			return $this->redirect($this->generateURL('listNews'));


		}
		else
		{
			return $this->render('CrystalNewsBundle:News:createNews.html.twig', array('news' => $news, 'category' => $category));
		}
	}
	public function updateAction($id)
	{

			$request = $this->getRequest();
			$em = $this->getDoctrine()->getEntityManager();
			$news = $em->getRepository('CrystalBaseBundle:catNews')->find($id);	
			$category = $em->getRepository('CrystalBaseBundle:catCategories')->findAll();	


			if($request->getMethod()=='POST')
			{
				$_POST = $request->request;

				$news->setContent($_POST->get('txtContent'));
				$news->setDate($_POST->get('txtDate'));
				$news->setKeywords($_POST->get('txtKeywords'));

				$category = $em->getRepository('CrystalBaseBundle:catCategories')->find($_POST->get('txtCategory'));
				$news->setidCategory($category);
				$em->persist($news);
				$em->flush();

				return $this->redirect($this->generateURL('listNews'));

			}
			else
			{
				return $this->render('CrystalNewsBundle:News:updateNews.html.twig', array('news' => $news, 'category' => $category));
			}

	}
	public function deleteAction($id)
		{
			$em = $this->getDoctrine()->getEntitymanager();
			$news = $em->getRepository('CrystalBaseBundle:catNews')->find($id);
			$category = $em->getRepository('CrystalBaseBundle:catCategories')->findByidCategory($id);
		
			$em->remove($news);
			$em->flush();
			return $this->redirect($this->generateURL('listNews'));
		}

}

?>