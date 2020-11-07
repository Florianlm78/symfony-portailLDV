<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Evaluation::class, mappedBy="cours", orphanRemoval=true)
     */
    private $Evaluations;

    public function __construct()
    {
        $this->Evaluations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Evaluation[]
     */
    public function getEvaluations(): Collection
    {
        return $this->Evaluations;
    }

    public function addEvaluation(Evaluation $Evaluation): self
    {
        if (!$this->Evaluations->contains($Evaluation)) {
            $this->Evaluations[] = $Evaluation;
            $Evaluation->setCours($this);
        }

        return $this;
    }

    public function removeEvaluation(Evaluation $Evaluation): self
    {
        if ($this->Evaluations->removeElement($Evaluation)) {
            // set the owning side to null (unless already changed)
            if ($Evaluation->getCours() === $this) {
                $Evaluation->setCours(null);
            }
        }

        return $this;
    }
}
