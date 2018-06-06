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
            $question->setSticker($this->getRandomSticker());
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
                "text" => "2 gilberts arrivent, je fais quoi ?",
                "responses" => [
                    [
                        "text" => "Je fais ci",
                    ],
                    [
                        "text" => "Je fais ça",
                    ],
                ]
            ],
            [
                "text" => "olala VM inc",
                "responses" => [
                    [
                        "text" => "j'abandonne",
                    ],
                    [
                        "text" => "oui",
                    ],
                    [
                        "text" => "non",
                    ],
                ]
            ]
        ];
    }

    private function getStickersData()
    {
        return [
            'http://image.noelshack.com/fichiers/2017/30/4/1501188178-jesusbestreup.png',
            'https://risibank.fr/cache/stickers/d1/188-static.png',
            'https://risibank.fr/cache/stickers/d325/32563-static.png',
            'https://risibank.fr/cache/stickers/d456/45638-static.png',
            'https://risibank.fr/cache/stickers/d341/34135-static.png',
        ];
    }

    private function getRandomSticker(): string
    {
        $stickers = $this->getStickersData();
        shuffle($stickers);
        $selectedSticker = array_slice($stickers, 0, 1);

        return array_shift($selectedSticker);
    }
}