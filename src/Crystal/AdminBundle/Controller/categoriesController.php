<?php
namespace Crystal\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\catCategories;


class categoriesController extends Controller
{
	public function listAction()
	{
		$category = new catCategories();
	   	$em = $this->getDoctrine()->getEntityManager();
		$category = $em->getRepository('CrystalBaseBundle:catCategories')->findAll();
		return $this->render('CrystalAdminBundle:Categories:listCategories.html.twig', array('category' => $category));
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
			return $this->render('CrystalAdminBundle:Categories:addCategories.html.twig', array('category' => $category));
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
				return $this->render('CrystalAdminBundle:Categories:updateCategories.html.twig', array('category' => $category));
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