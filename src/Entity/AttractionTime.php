<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttractionTimeRepository")
 */
class AttractionTime
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $waitTime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasFastpass;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSinglerider;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Attraction", inversedBy="attractionTimes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $attraction;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWaitTime(): ?int
    {
        return $this->waitTime;
    }

    public function setWaitTime(int $waitTime): self
    {
        $this->waitTime = $waitTime;

        return $this;
    }

    public function getHasFastpass(): ?bool
    {
        return $this->hasFastpass;
    }

    public function setHasFastpass(bool $hasFastpass): self
    {
        $this->hasFastpass = $hasFastpass;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIsSinglerider(): ?bool
    {
        return $this->isSinglerider;
    }

    public function setIsSinglerider(bool $isSinglerider): self
    {
        $this->isSinglerider = $isSinglerider;

        return $this;
    }

    public function getAttraction(): ?Attraction
    {
        return $this->attraction;
    }

    public function setAttraction(?Attraction $attraction): self
    {
        $this->attraction = $attraction;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
