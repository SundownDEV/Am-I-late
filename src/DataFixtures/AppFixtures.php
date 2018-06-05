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
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
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
    }

    private function loadQuestions(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $question = new Question();
            $question->setText($data['text']);
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

    private function getData()
    {
        return [
            [
                "text" => "ma question 1",
                "responses" => [
                    [
                        "text" => "option1",
                    ],
                    [
                        "text" => "option2",
                    ],
                ]
            ],
            [
                "text" => "ma question 2",
                "responses" => [
                    [
                        "text" => "option1",
                    ],
                    [
                        "text" => "option2",
                    ],
                    [
                        "text" => "option3",
                    ],
                ]
            ]
        ];
    }
}