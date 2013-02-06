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
				
			return $this->redirect($this->generateURL('listUsers'));


		}
		else
		{
			$users = $em->getRepository('CrystalBaseBundle:catUsers')->findAll();
			return $this->render('CrystalAdminBundle:Users:addAccess.html.twig', array('users' => $users));
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
        $dql = "SELECT a FROM CrystalBaseBundle:ctrAccess a where a.user=:user and a.password =:password";
      	$query = $em->createQuery($dql);
        $query->setParameter('user', $_POST->get('txtUser'));
        $query->setParameter('password', $_POST->get('txtPass'));
        $usuario = $query->getResult();
        $Session->start();
        $Session->set('id', $usuario[0]->getId());
        return $this->render('CrystalAdminBundle:Admin:admin.html.twig', array('session' => $Session->get('id')));
      }
      else
      {
        $Session->remove('id');
        return $this->render('CrystalAdminBundle:Admin:admin.html.twig', array('' => ''));
      }      
      
	}

}

?>