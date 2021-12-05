<?php

namespace App\Controller;

use App\Entity\Franchise;
use App\Form\FranchiseType;
use App\Repository\FranchiseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/franchise")
 */
class FranchiseController extends AbstractController
{
    /**
     * @Route("/", name="franchise_index", methods={"GET"})
     */
    public function index(FranchiseRepository $franchiseRepository): Response
    {
        return $this->render('franchise/index.html.twig', [
            'franchises' => $franchiseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="franchise_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $franchise = new Franchise();
        $form = $this->createForm(FranchiseType::class, $franchise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($franchise);
            $entityManager->flush();

            return $this->redirectToRoute('franchise_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('franchise/new.html.twig', [
            'franchise' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="franchise_show", methods={"GET"})
     */
    public function show(Franchise $franchise): Response
    {
        return $this->render('franchise/show.html.twig', [
            'franchise' => $franchise,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="franchise_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Franchise $franchise): Response
    {
        $form = $this->createForm(FranchiseType::class, $franchise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('franchise_index', [], Response::HTTP_SEE_OTHER);

        }

        return $this->renderForm('franchise/edit.html.twig', [
            'franchise' => $franchise,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="franchise_delete", methods={"POST"})
     */
    public function delete(Request $request, Franchise $franchise): Response
    {
        if ($this->isCsrfTokenValid('delete'.$franchise->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($franchise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('franchise_index', [], Response::HTTP_SEE_OTHER);
    }

}
