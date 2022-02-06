<?php

/**
 * @author Aleksander Hatkov
 * @todo create a new web application CRUD
 * database mysql
 * css Bootstrap-5
 * Framework Symfony
 */

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\TicketFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TicketController extends AbstractController
{
    /**
     * @Route("/web/list")
     */

    public function index(): Response
    {
        $date = $this->getDoctrine()->getRepository(Ticket::class)->findAll();
        return $this->render('web/list.html.twig', [
            'list' => $date
        ]);
    }

    /**
     * @Route("/web/create")
     */

    public function create(Request $request)
    {
        $ticket = new Ticket();
        $form = $this->createForm(TicketFormType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ticket);
            $entityManager->flush();

            return $this->render('web/index.html.twig');
        }
        return $this->render('web/save.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/update/{id}")
     */

    public function update(Request $request, $id)
    {
        $ticket = $this->getDoctrine()->getRepository(Ticket::class)->find($id);
        $form = $this->createForm(TicketFormType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ticket);
            $entityManager->flush();
            $this->addFlash('notice', 'Submitted Successfully');

            return $this->render('web/index.html.twig');
        }
        return $this->render('web/update.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}")
     */
    public function delete($id)
    {
        $data = $this->getDoctrine()->getRepository(Ticket::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($data);
        $entityManager->flush();
        return $this->render('web/index.html.twig');
    }


}