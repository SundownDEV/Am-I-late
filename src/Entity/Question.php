<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $response;

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $responses;

    /**
     * @ORM\Column(type="boolean")
     */
    private $valided;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gameover;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getResponse(): ?int
    {
        return $this->response;
    }

    public function setResponse(int $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getResponses()
    {
        return $this->responses;
    }

    public function setResponses($responses): self
    {
        $this->responses = $responses;

        return $this;
    }

    public function getValided(): ?bool
    {
        return $this->valided;
    }

    public function setValided(bool $valided): self
    {
        $this->valided = $valided;

        return $this;
    }

    public function getGameover(): ?bool
    {
        return $this->gameover;
    }

    public function setGameover(bool $gameover): self
    {
        $this->gameover = $gameover;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
