<?php
namespace Crystal\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\ctrAccess;
use Crystal\BaseBundle\Entity\catUsers;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;

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
				
			return $this->redirect($this->generateURL('addAccess'));


		}
		else
		{
			$users = $em->getRepository('CrystalBaseBundle:catUsers')->findAll();
			return $this->render('CrystalAdminBundle:Admin:addAdmin.html.twig', array('users' => $users));
		}
	}

	public function loginAction()
	{
		  $Session = new Session();
	      $request = $this->getRequest();

	      $em = $this->getDoctrine()->getEntityManager();
	      if($request->getMethod() == 'POST')
	      {
	      	
	      	$_POST = $request->request;
	        $dql = "SELECT a FROM CrystalBaseBundle:catUsers a where a.userName=:userName and a.pass =:pass";
	      	$query = $em->createQuery($dql);
	        $query->setParameter('userName', $_POST->get('txtUserAdmin'));
	        $query->setParameter('pass', $_POST->get('txtPassAdmin'));
	        $usuario = $query->getResult();

	        if(count($usuario) == 0)
	        {
	        	return $this->render('CrystalAdminBundle:Admin:login.html.twig', array('' => ''));  
	        }
	        else
	        {
	        	    $access = $em->getRepository('CrystalBaseBundle:ctrAccess')->findByidUser($usuario[0]->getid());

					if(count($access) == 0)
					{
		       			 return $this->render('CrystalAdminBundle:Admin:login.html.twig', array('' => ''));  
			   		}
			   		else
			   		{
			   			$Session->start();
				        $Session->set('id', $usuario[0]->getId());
				        return $this->render('CrystalAdminBundle:Admin:admin.html.twig', array('session' => $Session->get('id')));
			   		}
	        }
	      
      }
      else
      {
        $Session->remove('id');
        return $this->render('CrystalAdminBundle:Admin:login.html.twig', array('' => ''));
      }      
      
	}

}

?>