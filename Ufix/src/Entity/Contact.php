<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

class Contact {

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50)
     */
    private $name;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10, max=20000)
     */
    private $message;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|string $name
     * return Contact
     */
    public function setName( ?string $name): Contact
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return null|string $email
     * return Contact
     */
    public function setEmail( ?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return null|string $message
     * return Contact
     */
    public function setMessage( ?string $message): Contact
    {
        $this->message = $message;
        return $this;
    }

}