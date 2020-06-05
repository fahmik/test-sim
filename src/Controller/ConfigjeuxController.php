<?php

namespace App\Controller;

use App\Entity\Configjeux;
use App\Form\ConfigjeuxType;
use App\Repository\ConfigjeuxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/configjeux")
 */
class ConfigjeuxController extends AbstractController
{
    /**
     * @Route("/", name="configjeux_index", methods={"GET"})
     */
    public function index(ConfigjeuxRepository $configjeuxRepository): Response
    {
        return $this->render('configjeux/index.html.twig', [
            'configjeuxes' => $configjeuxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="configjeux_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $configjeux = new Configjeux();
        $form = $this->createForm(ConfigjeuxType::class, $configjeux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($configjeux);
            $entityManager->flush();

            return $this->redirectToRoute('configjeux_index');
        }

        return $this->render('configjeux/new.html.twig', [
            'configjeux' => $configjeux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="configjeux_show", methods={"GET"})
     */
    public function show(Configjeux $configjeux): Response
    {
        return $this->render('configjeux/show.html.twig', [
            'configjeux' => $configjeux,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="configjeux_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Configjeux $configjeux): Response
    {
        $form = $this->createForm(ConfigjeuxType::class, $configjeux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('configjeux_index');
        }

        return $this->render('configjeux/edit.html.twig', [
            'configjeux' => $configjeux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="configjeux_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Configjeux $configjeux): Response
    {
        if ($this->isCsrfTokenValid('delete'.$configjeux->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($configjeux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('configjeux_index');
    }
}
