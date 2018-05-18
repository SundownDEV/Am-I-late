<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * Response
 *
 * @ApiResource()
 * @ORM\Table(name="response")
 * @ORM\Entity(repositoryClass="App\Repository\ResponseRepository")
 */
class Response
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
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="reponses", cascade={"persist"})
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $question;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="response")
     * @ORM\Column(type="json_array")
     */
    private $child;

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

    public function getQuestion(): ?int
    {
        return $this->question;
    }

    public function setQuestion(int $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getChild()
    {
        return $this->child;
    }

    public function setChild($child): self
    {
        $this->child = $child;

        return $this;
    }
}
