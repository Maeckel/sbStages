<?php

namespace App\Controller;

use App\Entity\Stage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class StageController extends AbstractController
{
    
    public function voirTous(){
		
		$doctrine = $this -> getDoctrine() ;
		$connexion = $doctrine -> getConnection() ;
		$em = $doctrine -> getManager() ;
		$stage = $this->getDoctrine()->getRepository('App\Entity\Stage')->findAll();
		if ( $stage === NULL ) {
			throw $this -> createNotFoundException( 'Stage non recensé.' ) ;
		}
		else {
			return $this ->render('stage/index.html.twig',
										array( 'stage' => $stage )
							) ;
		}
	}
	
    public function voirStagesAnimateur($idAnimateur) {
		$doctrine = $this -> getDoctrine() ;
		$connexion = $doctrine -> getConnection() ;
		$em = $doctrine -> getManager() ;
		$id = $this->getDoctrine()->getRepository('App\Entity\Stage')->findBy(['animateur' => $idAnimateur]);
		if ( $id === NULL ) {
			throw $this -> createNotFoundException( 'Stage non recensé.' ) ;
		}
		else {
		return $this ->render('stage/index2.html.twig', array( 'id' => $id )) ;
		}
	}
	
	public function voirParticipants($idStage) {
		$doctrine = $this -> getDoctrine() ;
		$connexion = $doctrine -> getConnection() ;
		$em = $doctrine -> getManager() ;
		$ST = $this->getDoctrine()->getRepository('App\Entity\Stage')->findBy(['id' => $idStage]);
		if ( $ST === NULL ) {
			throw $this -> createNotFoundException( 'Stage non recensé.' ) ;
		}
		else {
		return $this ->render('stage/index3.html.twig', [ 'ST' => $ST ] ) ;
		}
	}
		
	public function voirSpecialistes($idStages) {
		$rp = $this -> getDoctrine() 
					-> getRepository('App\Entity\StageSpecialiste') ;
					
		$specialiste = $rp -> findByStage($idStages) ;
		
		return $this ->render('stage/index4.html.twig', [ 'specialiste' => $specialiste ] ) ;
	}
	
	#[Route('/new', name: 'app_stage_new', methods: ['GET', 'POST'])]
    public function Create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stage = new Stage();
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($stage);
            $entityManager->flush();

            return $this->redirectToRoute('app_visiteur2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('stage/new.html.twig', [
            'stage' => $stage,
            'form' => $form,
        ]);
    }

}
