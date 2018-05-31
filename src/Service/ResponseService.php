<?php
/**
 * Created by PhpStorm.
 * User: sundowndev
 * Date: 30/05/18
 * Time: 17:20
 */

namespace App\Service;

use App\Entity\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResponseService
{
    //private $object;
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function persistResponses(array $data, $question)
    {
        $entityManager = $this->getDoctrine()->getManager();

        foreach ($data as $text) {
            $entity = new Response();
            $entity->setText($text);
            $entity->setQuestion($question);

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($entity);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
        }
    }
}