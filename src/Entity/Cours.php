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
     * @ORM\OneToMany(targetEntity=Evalutation::class, mappedBy="cours", orphanRemoval=true)
     */
    private $evalutations;

    public function __construct()
    {
        $this->evalutations = new ArrayCollection();
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
     * @return Collection|Evalutation[]
     */
    public function getEvalutations(): Collection
    {
        return $this->evalutations;
    }

    public function addEvalutation(Evalutation $evalutation): self
    {
        if (!$this->evalutations->contains($evalutation)) {
            $this->evalutations[] = $evalutation;
            $evalutation->setCours($this);
        }

        return $this;
    }

    public function removeEvalutation(Evalutation $evalutation): self
    {
        if ($this->evalutations->removeElement($evalutation)) {
            // set the owning side to null (unless already changed)
            if ($evalutation->getCours() === $this) {
                $evalutation->setCours(null);
            }
        }

        return $this;
    }
}
