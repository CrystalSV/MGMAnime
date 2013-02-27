<?php 
namespace Crystal\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\catNews;
use Crystal\BaseBundle\Entity\catCategories;
use Crystal\BaseBundle\Entity\catUsers;
use Crystal\BaseBundle\Entity\ctrMultimedia;
use Crystal\AdminBundle\Resources\classes\image;
use Crystal\AdminBundle\Resources\classes\audio;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;

class newsController extends Controller
{
		public function listAction()
	{
		$new = new catNews();
	   	$em = $this->getDoctrine()->getEntityManager();
		$new = $em->getRepository('CrystalBaseBundle:catNews')->findAll();
		$category = $em->getRepository('CrystalBaseBundle:catCategories')->findAll();
		return $this->render('CrystalAdminBundle:News:listNews.html.twig', array('new' => $new, 'category' => $category));
	}

	public function addAction()
	{
		$Session = new Session();
	    $id = $Session->get('id');
	    if(isset($id))
	    {
			$news = new catNews();
			$category = new catCategories();
			$user = new catUsers();
			$imagen = new Image();
			$audio = new audio();
			$multi = new ctrMultimedia();
			$request = $this->getRequest();
			$_FILES = $request->files;
			$em = $this->getDoctrine()->getEntityManager();

			if ($request->getMethod() == 'POST') 
			{

				$_POST = $request->request;
				$categories = $em->getRepository('CrystalBaseBundle:catCategories')->find($_POST->get('txtId'));
				$news->setContent($_POST->get('txtContent'));
				$news->setTitle($_POST->get('txtTitle'));
				$news->setDate(date('m/d/Y'));
				$news->setKeywords($_POST->get('txtKeywords'));
				$news->setidCategory($categories);

				$user = $em->getRepository('CrystalBaseBundle:catUsers')->find($id);
				$news->setidUser($user);
				
				
				$em->persist($news);
				$em->flush();

			    $imagen->img = $_FILES->get('imagen');
	            if($imagen->checkErrors() == 'NoError')
	             {

	                 $multi->setPath($imagen->upload());
	                 $multi->setType('imagen');
	                 $multi->setidNew($news);

	                 $em->persist($multi);
					 $em->flush();

	             }

	            if($_FILES->get('mp3') != "")
	            {
	            	$audio->audio = $_FILES->get('mp3');
		            if($audio->checkErrors() == 'NoError')
		             {

		                 $multi->setPath($audio->upload());
		                 $multi->setType('mp3');
		                 $multi->setidNew($news);

		                 $em->persist($multi);
						 $em->flush();

		             }
	            }	
	           
	            
	        	if($_FILES->get('ogg') != "")
	        	{

		            $audio->audio = $_FILES->get('ogg');
		            if($audio->checkErrors() == 'NoError')
		             {

		                 $multi->setPath($audio->upload());
		                 $multi->setType('ogg');
		                 $multi->setidNew($news);

		                 $em->persist($multi);
						 $em->flush();

		             }
	     	    }
					
				return $this->redirect($this->generateURL('listNews'));


			}
			else
			{
				$categories = $em->getRepository('CrystalBaseBundle:catCategories')->findAll();
				return $this->render('CrystalAdminBundle:News:createNews.html.twig', array('news' => $news, 'categories' => $categories, 'user' => $user));
			}
		}
		else
        {
            return $this->redirect($this->generateURL('login'));   
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
				return $this->render('CrystalAdminBundle:News:updateNews.html.twig', array('news' => $news, 'category' => $category));
			}

	}
	public function deleteAction($id)
		{
			$em = $this->getDoctrine()->getEntitymanager();
			$news = $em->getRepository('CrystalBaseBundle:catNews')->find($id);
			$category = $em->getRepository('CrystalBaseBundle:catCategories')->find($id);
		
			$em->remove($news);
			$em->flush();
			return $this->redirect($this->generateURL('listNews'));
		}
}

?>