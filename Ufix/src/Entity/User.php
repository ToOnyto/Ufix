<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;


    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="text")
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="array")
     * @ORM\OneToMany(targetEntity="App\Entity\Ad", mappedBy="owner", cascade={"persist"})
     */
    private $ownedAds;

    /**
     * 
     * @ORM\Column(type="array")
     * @ORM\OneToMany(targetEntity="App\Entity\Ad", mappedBy="repairer", cascade={"persist"})
     *
     */
    private $repairedAds;

    /**
     * 
     * @ORM\Column(type="array")
     * @ORM\OneToMany(targetEntity="App\Entity\RepairProposition", mappedBy="proposer", cascade={"persist"})
     *
     */
    private $repairPropositions;

    public function __construct()
    {
        // $this->ownedAds = new ArrayCollection();
        // $this->repairedAds = new ArrayCollection();
        // $this->repairPropositions = new ArrayCollection();
    }

  
    public function getOwnedAds()
    {
        return $this->ownedAds;
    }
 
    public function setOwnedAds($ownedAds)
    {
        $this->ownedAds = $ownedAds;
    }
    public function addOwnedAd(Ad $ad)
    {

        $this->ownedAds[] = $ad;
        // if (!$this->ownedAds->contains($ad)) {
        //     $this->ownedAds->add($ad);
        //     return true;
        // }
        return true;
    }

    public function getRepairedAds()
    {
        return $this->ownedAds;
    }

    public function setRepairedAds($repairedAds)
    {
        $this->repairedAds = $repairedAds;
    }
    public function addRepairedAd(Ad $ad)
    {
        $this->repairedAds[] = $ad;
        // if (!$this->repairedAds->contains($ad)) {
        //     $this->repairedAds->add($ad);
        //     return true;
        // }
        return true;
    }

    
    public function getRepairPropositions()
    {
        return $this->repairPropositions;
    }
   
    public function setRepairPropositions($repairPropositions)
    {
        $this->repairPropositions = $repairPropositions;
    }
    public function addRepairProposition(RepairProposition $repairProposition)
    {

        $this->repairPropositions[] = $repairProposition;
        // if (!$this->repairPropositions->contains($repairProposition)) {
        //     $this->repairPropositions->add($repairProposition);
        //     return true;
        // }
        return true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostCode(): ?int
    {
        return $this->postCode;
    }

    public function setPostCode(int $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }
}
