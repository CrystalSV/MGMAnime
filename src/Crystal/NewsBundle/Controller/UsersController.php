<?php

namespace Crystal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crystal\BaseBundle\Entity\catUsers;

class UsersController extends Controller
{

    public function listAction()
    {
        $user = new catUsers();
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('CrystalBaseBundle:catUsers')->findAll();
        return $this->render('CrystalNewsBundle:Users:listUsers.html.twig', array('user' => $user));
    }

    public function validateUserAction()
    {
        $request = $this->getRequest();
        $exists = false;

        if ($request->isXmlHttpRequest()) 
        {
            $_POST = $request->request;
            $em = $this->getDoctrine()->getEntityManager();
            $User = $em->getRepository('CrystalBaseBundle:catUsers')->findByuserName($_POST->get('name'));
            
            if(count($User) > 0)
            {
                $exists = true;
            }
            else
            {
                $exists = false;
            }
        }

        return $this->render('CrystalNewsBundle:User:validateUser.html.twig', array('exists' => $exists));
    }

    public function registerAction()
    {
        $user = new catUsers();

        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') 
        {

            $_POST = $request->request;

            $user->setUserName($_POST->get('txtUserName'));
            $user->setMail($_POST->get('txtMail'));
            $user->setPass($_POST->get('txtPass'));
            $user->setGender('N');
            $user->setBirthday($_POST->get('txtBirthDay'));
            $user->setAge($_POST->get('txtAge'));
            
            $em->persist($user);
            $em->flush();
                
            return $this->redirect($this->generateURL('Index'));


        }
        else
        {
            return $this->render('CrystalNewsBundle:User:register.html.twig');
        }
    }
    public function updateAction($id)
    {

        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('CrystalBaseBundle:catUsers')->find($id);

        if($request->getMethod()=='POST')
        {
            $_POST = $request->request;

            $user->setUserName($_POST->get('txtUserName'));
            $user->setMail($_POST->get('txtMail'));
            $user->setPass($_POST->get('txtPass'));
            $user->setSignature($_POST->get('txtSignature'));
            $user->setGender($_POST->get('txtGender'));
            $user->setAge($_POST->get('txtAge'));
            $user->setOcupations($_POST->get('txtOcupations'));
            $user->setHobbies($_POST->get('txtHobbies'));
            $user->setBirthday($_POST->get('txtBirthday'));
            $user->setWebsite($_POST->get('txtWebsite'));
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateURL('listUsers'));

        }
        else
        {
            return $this->render('CrystalNewsBundle:Users:updateUsers.html.twig', array('user' => $user));
        }

    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntitymanager();
        $user = $em->getRepository('CrystalBaseBundle:catUsers')->find($id);
    

        $em->remove($user);
        $em->flush();
        return $this->redirect($this->generateURL('listUsers'));
    }
}
