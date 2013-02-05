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
		return $this->render('CrystalNewsBundle:Multimedia:listMultimedia.html.twig', array('multimedia' => $multimedia));
	}

	public function addAction()
	{
		$multimedia = new ctrMultimedia();

		$em = $this->getDoctrine()->getEntityManager();
		$request = $this->getRequest();

		if ($request->getMethod() == 'POST') 
		{

			$_POST = $request->request;

			$multimedia->setpath($_POST->get('txtLink'));
			$multimedia->settype($_POST->get('txtType'));
			
			$em->persist($multimedia);
			$em->flush();
				
			return $this->redirect($this->generateURL('listMultimedia'));


		}
		else
		{
			return $this->render('CrystalNewsBundle:Multimedia:addMultimedia.html.twig', array('multimedia' => $multimedia));
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
			$multimedia = $em->getRepository('CrystalBaseBundle:ctrMultimedia')->find($id);
		
	
			$em->remove($multimedia);
			$em->flush();
			return $this->redirect($this->generateURL('listMultimedia'));
		}

}