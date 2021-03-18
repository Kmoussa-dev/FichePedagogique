<?php

namespace App\Controller;

use App\Entity\EtudiantAjac;
use App\Entity\Inscription;
use App\Entity\User;
use App\Form\AjacType;
use App\Form\EditUserType;
use App\Repository\InscriptionRepository;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 * Class AdminController
 * @package App\Controller
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     * @param InscriptionRepository $inscriptionRepository
     * @param Request $request
     * @return Response
     */
    public function index( InscriptionRepository $inscriptionRepository,Request $request): Response
    {
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }


    /**
     * @Route("/admin/utilisateurs", name="admin/utilisateurs")
     * @param UserRepository $users
     * @return Response
     */
    public function listeUtilisateur( UserRepository $users): Response
    {
        return $this->render("admin/users.html.twig",[
            'users'=>$users->findAll()
        ]);

    }

    /**
     * modifier un utilisateur
     * @Route ("/utilisateur/modifier/{id}",name="modifier_utilisateur")
     */
    public function modifierUtilisateur(User  $user,Request $request){
        $form=$this->createForm(EditUserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('message','Utilisateur modifié avec succès');
            return $this->redirectToRoute('admin/utilisateurs');
        }
        return $this->render('admin/modifierUtilisateur.html.twig',[
            'userForm'=>$form->createView()
        ]);

    }
}
