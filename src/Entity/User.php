<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private string $email;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'string')]
    private string $password;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $firstName;

    #[ORM\Column(type: 'boolean')]
    private ?bool $active;

    #[ORM\ManyToOne(targetEntity: School::class, inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?School $school;

    #[ORM\OneToMany(mappedBy: 'organisedBy', targetEntity: Event::class)]
    private Collection $organiserFor;

    #[ORM\ManyToMany(targetEntity: Event::class, mappedBy: 'registratedUsers')]
    private Collection $registratedFor;

    #[ORM\Column(type: 'string')]
    private $phoneNumber;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pseudo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $profilPics;



    public function __construct()
    {
        $this->organiserFor = new ArrayCollection();
        $this->registratedFor = new ArrayCollection();
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
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
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
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(?School $school): self
    {
        $this->school = $school;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getOrganiserFor(): Collection
    {
        return $this->organiserFor;
    }

    public function addOrganiserFor(Event $organiserFor): self
    {
        if (!$this->organiserFor->contains($organiserFor)) {
            $this->organiserFor[] = $organiserFor;
            $organiserFor->setOrganisedBy($this);
        }

        return $this;
    }

    public function removeOrganiserFor(Event $organiserFor): self
    {
        if ($this->organiserFor->removeElement($organiserFor)) {
            // set the owning side to null (unless already changed)
            if ($organiserFor->getOrganisedBy() === $this) {
                $organiserFor->setOrganisedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getRegistratedFor(): Collection
    {
        return $this->registratedFor;
    }

    public function addRegistratedFor(Event $registratedFor): self
    {
        if (!$this->registratedFor->contains($registratedFor)) {
            $this->registratedFor[] = $registratedFor;
            $registratedFor->addRegistratedUser($this);
        }

        return $this;
    }

    public function removeRegistratedFor(Event $registratedFor): self
    {
        if ($this->registratedFor->removeElement($registratedFor)) {
            $registratedFor->removeRegistratedUser($this);
        }

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getProfilPics(): ?string
    {
        return $this->profilPics;
    }

    public function setProfilPics(?string $profilPics): self
    {
        $this->profilPics = $profilPics;

        return $this;
    }

}
