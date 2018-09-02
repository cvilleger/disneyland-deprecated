<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttractionRepository")
 */
class Attraction
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
    private $ref;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isStudio;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AttractionTime", mappedBy="attraction", orphanRemoval=true)
     */
    private $attractionTimes;

    public function __construct()
    {
        $this->attractionTimes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsStudio(): ?bool
    {
        return $this->isStudio;
    }

    public function setIsStudio(bool $isStudio): self
    {
        $this->isStudio = $isStudio;

        return $this;
    }

    /**
     * @return Collection|AttractionTime[]
     */
    public function getAttractionTimes(): Collection
    {
        return $this->attractionTimes;
    }

    public function addAttractionTime(AttractionTime $attractionTime): self
    {
        if (!$this->attractionTimes->contains($attractionTime)) {
            $this->attractionTimes[] = $attractionTime;
            $attractionTime->setAttraction($this);
        }

        return $this;
    }

    public function removeAttractionTime(AttractionTime $attractionTime): self
    {
        if ($this->attractionTimes->contains($attractionTime)) {
            $this->attractionTimes->removeElement($attractionTime);
            // set the owning side to null (unless already changed)
            if ($attractionTime->getAttraction() === $this) {
                $attractionTime->setAttraction(null);
            }
        }

        return $this;
    }
}
