<?php
namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\ctrMultimedia;

class multimediaController extends Controller
{
	public function listAction()
	{
		$multimedia = new ctrMultimedia();
	   	$em = $this->getDoctrine()->getEntityManager();
		$multimedia = $em->getRepository('CrystalBaseBundle:ctrMultimedia')->findAll();
		return $this->render('CrystalNewsBundle:multimedia:listMultimedia.html.twig', array('multimedia' => $multimedia));
	}

	public function addAction()
	{
		$category = new catCategories();

		$em = $this->getDoctrine()->getEntityManager();
		$request = $this->getRequest();

		if ($request->getMethod() == 'POST') 
		{

			$_POST = $request->request;

			$category->setName($_POST->get('txtName'));
			
			$em->persist($category);
			$em->flush();
				
			return $this->redirect($this->generateURL('listCategories'));


		}
		else
		{
			return $this->render('CrystalNewsBundle:categories:addCategories.html.twig', array('category' => $category));
		}
	}

	public function updateAction($id)
	{

			$request = $this->getRequest();
			$em = $this->getDoctrine()->getEntityManager();
			$category = $em->getRepository('CrystalBaseBundle:catCategories')->find($id);

			if($request->getMethod()=='POST')
			{
				$_POST = $request->request;

				$category->setName($_POST->get('txtName'));
				$em->persist($category);
				$em->flush();

				return $this->redirect($this->generateURL('listCategories'));

			}
			else
			{
				return $this->render('CrystalNewsBundle:categories:updateCategories.html.twig', array('category' => $category));
			}

	}

	public function deleteAction($id)
		{
			$em = $this->getDoctrine()->getEntitymanager();
			$category = $em->getRepository('CrystalBaseBundle:catCategories')->find($id);
		
	
			$em->remove($category);
			$em->flush();
			return $this->redirect($this->generateURL('listCategories'));
		}

}