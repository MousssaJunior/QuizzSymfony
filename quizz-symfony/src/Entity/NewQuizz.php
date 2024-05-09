<?php

namespace App\Entity;

use App\Repository\NewQuizzRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewQuizzRepository::class)]
class NewQuizz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_quizz = null;

    #[ORM\Column]
    private ?int $id_question = null;

    #[ORM\Column]
    private ?int $id_reponse = null;

    #[ORM\Column]
    private ?int $id_categorie = null;

    #[ORM\Column(nullable: true)]
    private ?int $id_user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomQuizz(): ?string
    {
        return $this->nom_quizz;
    }

    public function setNomQuizz(string $nom_quizz): static
    {
        $this->nom_quizz = $nom_quizz;

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

    public function getIdCategorie(): ?int
    {
        return $this->id_categorie;
    }

    public function setIdCategorie(int $id_categorie): static
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(?int $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }
}
