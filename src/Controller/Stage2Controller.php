<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Form\StageType;
use App\Repository\StageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/stage2')]
class Stage2Controller extends AbstractController
{
    #[Route('/', name: 'app_stage2_index', methods: ['GET'])]
    public function index(StageRepository $stageRepository): Response
    {
        return $this->render('stage2/index.html.twig', [
            'stages' => $stageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_stage2_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StageRepository $stageRepository): Response
    {
        $stage = new Stage();
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stageRepository->save($stage, true);

            return $this->redirectToRoute('app_stage2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('stage2/new.html.twig', [ 'stage' => $stage  ,  'form' => $form  ]);
    }

    #[Route('/{id}', name: 'app_stage2_show', methods: ['GET'])]
    public function show(Stage $stage): Response
    {
        return $this->render('stage2/show.html.twig', [
            'stage' => $stage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_stage2_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Stage $stage, StageRepository $stageRepository): Response
    {
        $form = $this->createForm(StageType::class, $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stageRepository->save($stage, true);

            return $this->redirectToRoute('app_stage2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('stage2/edit.html.twig', [
            'stage' => $stage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_stage2_delete', methods: ['POST'])]
    public function delete(Request $request, Stage $stage, StageRepository $stageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stage->getId(), $request->request->get('_token'))) {
            $stageRepository->remove($stage, true);
        }

        return $this->redirectToRoute('app_stage2_index', [], Response::HTTP_SEE_OTHER);
    }
}
