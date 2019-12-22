<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Enum\AdType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdRepository")
 */
class Ad
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
    private $adType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productName;

    /**
     * @ORM\Column(type="integer")
     */
    private $productCategory;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productBreakDescription;

    /**
     * @ORM\Column(type="integer")
     */
    private $productPrice;

    /**
     * @ORM\Column(type="text")
     */
    private $adDescription;


    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="ownedAds" , cascade={"persist"})
     */
    private $owner;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="repairedAds" , cascade={"persist"})
     */
    private $repairer;

    // /**
    //  * @var User
    //  * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="products" , cascade={"persist"})
    //  */
    // private $buyer;

    // private $states;

    /**
     * @var ArrayCollection
     * @ORM\Column(type="array")
     * @ORM\OneToMany(targetEntity="App\Entity\RepairProposition", mappedBy="ad", cascade={"persist"})
     *
     */
    private $repairPropositions;

    function __construct()
    {
        // $this->adType = AdType::REPAIR_AND_GET_BACK;
        $this->repairPropositions = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getRepairPropositions()
    {
        return $this->repairPropositions;
    }
    /**
     * @param ArrayCollection $repairPropositions
     */
    public function setRepairPropositions($repairPropositions)
    {
        $this->repairPropositions = $repairPropositions;
    }
    public function addRepairProposition(RepairProposition $repairProposition)
    {
        if (!$this->repairPropositions->contains($repairProposition)) {
            $this->repairPropositions->add($repairProposition);
            return true;
        }
        return false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdType(): ?int
    {
        return $this->AdType;
    }

    public function setAdType($adType): self
    {
        $this->adType = $adType;

        return $this;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductCategory(): ?int
    {
        return $this->productCategory;
    }

    public function setProductCategory(int $productCategory): self
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    public function getProductBreakDescription(): ?string
    {
        return $this->productBreakDescription;
    }

    public function setProductBreakDescription(string $productBreakDescription): self
    {
        $this->productBreakDescription = $productBreakDescription;

        return $this;
    }

    public function getProductPrice(): ?int
    {
        return $this->productPrice;
    }

    public function setProductPrice(int $productPrice): self
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getAdDescription(): ?string
    {
        return $this->adDescription;
    }

    public function setAdDescription(string $adDescription): self
    {
        $this->adDescription = $adDescription;

        return $this;
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }
    /**
     * @param User $user
     */
    public function setOwner(User $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return User
     */
    public function getRepairer(): User
    {
        return $this->repairer;
    }
    /**
     * @param User $user
     */
    public function setRepairer(User $repairer): void
    {
        $this->repairer = $repairer;
    }
}
