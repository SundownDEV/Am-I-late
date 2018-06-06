<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/")
 */
class QuestionApiController extends Controller
{
    /**
     * @Route("/questions/first", name="api_questions_first")
     */
    public function getFirst(QuestionRepository $questionRepository)
    {
        $data = $questionRepository->findFirst();

        return JsonResponse::create($data, 200, ['Content-Type' => 'application/json']);
    }
}