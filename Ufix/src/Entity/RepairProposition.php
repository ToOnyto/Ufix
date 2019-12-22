<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RepairPropositionRepository")
 */
class RepairProposition
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
    private $price;

    /**
     * @ORM\Column(type="text")
     */
    private $description;


    /**
     * @var Ad
     * @ORM\ManyToOne(targetEntity="App\Entity\Ad", inversedBy="repairPropositions" , cascade={"persist"})
     */
    private $ad;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="repairPropositions" , cascade={"persist"})
     */
    private $proposer; //le réparateur qui a fait une proposition de réparation

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return User
     */
    public function getProposer(): User
    {
        return $this->proposer;
    }
    /**
     * @param User $proposer
     */
    public function setProposer(User $proposer): void
    {
        $this->proposer = $proposer;
    }

    /**
     * @return Ad
     */
    public function getAd(): User
    {
        return $this->proposer;
    }
    /**
     * @param Ad $ad
     */
    public function setAd(Ad $ad): void
    {
        $this->ad = $ad;
    }
}
