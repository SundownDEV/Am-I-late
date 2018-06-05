<?php

namespace App\Controller;

use App\Entity\Response;
use App\Form\ResponseType;
use App\Repository\ResponseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/response")
 */
class ResponseController extends Controller
{
    /**
     * @Route("/", name="response_index", methods="GET")
     */
    public function index(ResponseRepository $responseRepository): HttpResponse
    {
        return $this->render('response/index.html.twig', ['responses' => $responseRepository->findAll()]);
    }

    /**
     * @Route("/new", name="response_new", methods="GET|POST")
     */
    public function new(Request $request): HttpResponse
    {
        $response = new Response();
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush();

            return $this->redirectToRoute('response_index');
        }

        return $this->render('response/new.html.twig', [
            'response' => $response,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="response_show", methods="GET")
     */
    public function show(Response $response): HttpResponse
    {
        return $this->render('response/show.html.twig', ['response' => $response]);
    }

    /**
     * @Route("/{id}/edit", name="response_edit", methods="GET|POST")
     */
    public function edit(Request $request, Response $response): HttpResponse
    {
        $form = $this->createForm(ResponseType::class, $response);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('response_edit', ['id' => $response->getId()]);
        }

        return $this->render('response/edit.html.twig', [
            'response' => $response,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="response_delete", methods="DELETE")
     */
    public function delete(Request $request, Response $response): HttpResponse
    {
        if ($this->isCsrfTokenValid('delete'.$response->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($response);
            $em->flush();
        }

        return $this->redirectToRoute('response_index');
    }
}
