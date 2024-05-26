<?php

namespace App\Entity;

use App\Repository\HistoriqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriqueRepository::class)]
class Historique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_user = null;

    #[ORM\Column]
    private ?int $id_categorie = null;

    #[ORM\Column(length: 255)]
    private ?string $name_categorie = null;

    #[ORM\Column]
    private ?int $id_question = null;

    #[ORM\Column]
    private ?int $id_reponse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdCategorie(): ?int
    {
        return $this->id_categorie;
    }

    public function setIdCategorie(int $id_categorie): static
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }

    public function getNameCategorie(): ?string
    {
        return $this->name_categorie;
    }

    public function setNameCategorie(string $name_categorie): static
    {
        $this->name_categorie = $name_categorie;

        return $this;
    }

    public function getIdQuestion(): ?int
    {
        return $this->id_question;
    }

    public function setIdQuestion(int $id_question): static
    {
        $this->id_question = $id_question;

        return $this;
    }

    public function getIdReponse(): ?int
    {
        return $this->id_reponse;
    }

    public function setIdReponse(int $id_reponse): static
    {
        $this->id_reponse = $id_reponse;

        return $this;
    }
}
