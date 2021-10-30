<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Omines\DataTablesBundle\DataTableFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Omines\DataTablesBundle\Adapter\ArrayAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;

class FormationController extends AbstractController
{

    #[Route('/welcome', name: 'bienvenue')]
    public function indexW(): Response
    {
        return $this->render('base.html.twig');
    }
    #[Route('/formation', name: 'formation')]
    public function index(): Response
    {
        $var="jesser";
        return $this->render('formation/index.html.twig', [
            'controller_name' => 'FormationController',
            'var'=>$var
        ]);
    }
    #[Route('/addEtudiant', name: 'addEtudiant')]
    public function addEtudiant(EntityManagerInterface $em,Request $request): Response
    {
        $etudiant=new Etudiant();
        $form=$this->createForm(EtudiantType::class,$etudiant);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
         $em->persist($etudiant);
         $em->flush();
        }
        return $this->render('Etudiant/addEtudiant.html.twig', [
            'formInscription'=>$form->createView()
        ]);
    }
    #[Route('/CRUD', name: 'CRUD')]
    public function liste_etudiants(EtudiantRepository $rep): Response
    {
    $listes=$rep->findAll();
        return $this->render('Etudiant/liste.html.twig',[
            'etudiants'=>$listes
            ]);
    }

    #[Route('/delete_etuddiant/{id}', name: 'delete_etudiant')]
    public function delete_etudiants($id,EtudiantRepository $rep , EntityManagerInterface $em): Response
    {
        $etudiant=$rep->find($id);

        if(!$etudiant){
            throw $this->createNotFoundException("L'etudiant d'id " .$id.  " n'existe pas.");
        }
        $em->remove($etudiant);
        $em->flush();
        // $this->addFlash('danger', 'etudiant '.$id.'  a bien étais supprimer');
        return $this->redirectToRoute('CRUD');
    }

    #[Route('/update_etudiant/{id}', name: 'update_etudiant')]
    public function modif_etudiants($id,EtudiantRepository $rep , EntityManagerInterface $em, Request $request): Response
    {
        $etudiant=$rep->findOneById($id);
        $form=$this->createFormBuilder($etudiant)
        ->add('nom')
        ->add('prenom')
        ->add('age')
        ->add('cin')
            ->getForm();
        $form->handleRequest($request);//recupere les donnes de la requete
        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute('CRUD');
        }
        return $this->render('Etudiant/update.html.twig',[
            'formEtudiant'=>$form->createView()
        ]);
    }

    #[Route('/datatable', name: 'datatable')]
    public function showAction(Request $request, DataTableFactory $dataTableFactory)
{


    $table = $dataTableFactory->create()
        ->add('nom', TextColumn::class)
        ->add('prenom', TextColumn::class)
        ->add('age', TextColumn::class)
        ->add('cin', TextColumn::class)
        ->createAdapter(ORMAdapter::class, [
            'entity' => Etudiant::class,
        ])->handleRequest($request);

    if ($table->isCallback()) {
        return $table->getResponse();
    }

    return $this->render('datatable/list.html.twig', ['datatable' => $table]);
}
}
