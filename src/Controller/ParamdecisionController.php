<?php

namespace App\Controller;

use App\Entity\Paramdecision;
use App\Form\ParamdecisionType;
use App\Repository\ParamdecisionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/paramdecision")
 */
class ParamdecisionController extends AbstractController
{
    /**
     * @Route("/", name="paramdecision_index", methods={"GET"})
     */
    public function index(ParamdecisionRepository $paramdecisionRepository): Response
    {
        return $this->render('paramdecision/index.html.twig', [
            'paramdecisions' => $paramdecisionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="paramdecision_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $paramdecision = new Paramdecision();
        $form = $this->createForm(ParamdecisionType::class, $paramdecision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($paramdecision);
            $entityManager->flush();

            return $this->redirectToRoute('paramdecision_index');
        }

        return $this->render('paramdecision/new.html.twig', [
            'paramdecision' => $paramdecision,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="paramdecision_show", methods={"GET"})
     */
    public function show(Paramdecision $paramdecision): Response
    {
        return $this->render('paramdecision/show.html.twig', [
            'paramdecision' => $paramdecision,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="paramdecision_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Paramdecision $paramdecision): Response
    {
        $form = $this->createForm(ParamdecisionType::class, $paramdecision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('paramdecision_index');
        }

        return $this->render('paramdecision/edit.html.twig', [
            'paramdecision' => $paramdecision,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="paramdecision_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Paramdecision $paramdecision): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paramdecision->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($paramdecision);
            $entityManager->flush();
        }

        return $this->redirectToRoute('paramdecision_index');
    }
}
