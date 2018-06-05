<?php
/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DataFixtures;

use App\Entity\Question;
use App\Entity\Response;
use App\Repository\ResponseRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AppFixtures extends Fixture
{
    private $container;

    public function __construct(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadQuestions($manager);
        $this->loadResponses($manager);
    }

    private function loadQuestions(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $question = new Question();
            $question->setText($data['text']);
            $question->setToken($data['token']);
            $manager->persist($question);

            foreach ($data['responses'] as $response) {
                $newResponse = new Response();
                $newResponse->setText($response['text']);
                $newResponse->setQuestion($question);
                $manager->persist($newResponse);
            }
        }

        $manager->flush();
    }

    private function loadResponses(ObjectManager $manager)
    {
        $container = $this->container->get('doctrine');
        $responseRepository = $container->getRepository('App:Response');
        $questionRepository = $container->getRepository('App:Question');

        foreach ($this->getData() as $data) {
            foreach ($data['responses'] as $response) {
                if (null !== $response['child']) {
                    $newResponse = $responseRepository->findOneBy(['text' => $response['text']]);
                    $question = $questionRepository->findByToken($response['child']);

                    if (null !== $newResponse && null !== $question) {
                        $newResponse->setChild($question);
                        $manager->flush();
                    }
                }
            }
        }
    }

    private function getData()
    {
        return [
            [
                "token" => "aNs9skL",
                "text" => "ma question 1",
                "responses" => [
                    [
                        "text" => "option1",
                        "child" => "0ks6dkP",
                    ],
                    [
                        "text" => "option2",
                        "child" => null,
                    ],
                ]
            ],
            [
                "token" => "0ks6dkP",
                "text" => "ma question 2",
                "responses" => [
                    [
                        "text" => "option1",
                        "child" => null,
                    ],
                    [
                        "text" => "option2",
                        "child" => null,
                    ],
                    [
                        "text" => "option3",
                        "child" => null,
                    ],
                ]
            ]
        ];
    }
}