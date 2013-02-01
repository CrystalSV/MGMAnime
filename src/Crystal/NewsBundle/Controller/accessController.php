<?php
namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\ctrAccess;
use Crystal\BaseBundle\Entity\catUsers;

class accessController extends Controller
{
	public function addAction()
	{
		$access = new ctrAccess();

		$em = $this->getDoctrine()->getEntityManager();
		$request = $this->getRequest();

		if ($request->getMethod() == 'POST') 
		{

			$_POST = $request->request;

			$user = $em->getRepository('CrystalBaseBundle:catUsers')->find($_POST->get('txtId'));
			$access->setidUser($user);
		
			
			$em->persist($access);
			$em->flush();
				
			return $this->redirect($this->generateURL('listUsers'));


		}
		else
		{
			$users = $em->getRepository('CrystalBaseBundle:catUsers')->findAll();
			return $this->render('CrystalNewsBundle:Users:addAccess.html.twig', array('users' => $users));
		}
	}
}

?>