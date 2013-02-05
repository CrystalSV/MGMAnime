<?php
namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\ctrAccess;

class accessController extends Controller
{
	public function addAction()
	{
		$user = new ctrAccess();

		$em = $this->getDoctrine()->getEntityManager();
		$request = $this->getRequest();

		if ($request->getMethod() == 'POST') 
		{

			$_POST = $request->request;

			$access->setidUser($id);
		
			
			$em->persist($access);
			$em->flush();
				
			return $this->redirect($this->generateURL('listUsers'));


		}
		else
		{
			return $this->render('CrystalNewsBundle:users:addUsers.html.twig', array('user' => $user));
		}
	}
}

?>