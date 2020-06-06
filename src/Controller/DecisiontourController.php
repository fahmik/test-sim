<?php

namespace App\Controller;

use App\Entity\Decisiontour;
use App\Form\DecisiontourType;
use App\Repository\DecisiontourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/decisiontour")
 */
class DecisiontourController extends AbstractController
{
    /**
     * @Route("/", name="decisiontour_index", methods={"GET"})
     */
    public function index(DecisiontourRepository $decisiontourRepository): Response
    {
        return $this->render('decisiontour/index.html.twig', [
            'decisiontours' => $decisiontourRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="decisiontour_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $decisiontour = new Decisiontour();
        $form = $this->createForm(DecisiontourType::class, $decisiontour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($decisiontour);
            $entityManager->flush();

            return $this->redirectToRoute('decisiontour_index');
        }

        return $this->render('decisiontour/new.html.twig', [
            'decisiontour' => $decisiontour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decisiontour_show", methods={"GET"})
     */
    public function show(Decisiontour $decisiontour): Response
    {
        return $this->render('decisiontour/show.html.twig', [
            'decisiontour' => $decisiontour,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="decisiontour_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Decisiontour $decisiontour): Response
    {
        $form = $this->createForm(DecisiontourType::class, $decisiontour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('decisiontour_index');
        }

        return $this->render('decisiontour/edit.html.twig', [
            'decisiontour' => $decisiontour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decisiontour_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Decisiontour $decisiontour): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decisiontour->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($decisiontour);
            $entityManager->flush();
        }

        return $this->redirectToRoute('decisiontour_index');
    }
}
