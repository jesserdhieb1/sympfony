<?php

namespace App\Controller;

use App\Entity\Formateurs;
use App\Form\FormateurType;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\check;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormateurController extends AbstractController
{
    #[Route('/formateur', name: 'formateur')]
    public function index(): Response
    {
        return $this->render('formateur/index.html.twig', [
            'controller_name' => 'FormateurController',
        ]);
    }

    /**
     * @throws \Exception
     */
    #[Route('/addformateur', name: 'addformateur')]
    public function addformateur(EntityManagerInterface $em,Request $request,check $service): Response
    {
        $formateur=new Formateurs();
        $form=$this->createForm(FormateurType::class,$formateur);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()) {
            if ($service->checklenght($formateur->getNom()) < 6) {
                throw new \Exception('nom doit etre sup a 6');
            } else {
                $formateur->setNom(strtoupper($formateur->getNom()));
                $em->persist($formateur);
                $em->flush();
            }
        }

        return $this->render('formateur/addFormateur.html.twig', [
            'formInscription'=>$form->createView()
        ]);
    }

}
