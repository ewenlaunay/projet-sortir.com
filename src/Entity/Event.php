<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateTimeStart;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $duration;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $registrationDeadline;

    #[ORM\Column(type: 'integer')]
    private ?int $maxRegistration;

    #[ORM\Column(type: 'text')]
    private ?string $infos;

    #[ORM\ManyToOne(targetEntity: Status::class, inversedBy: 'events')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Status $status;

    #[ORM\ManyToOne(targetEntity: School::class, inversedBy: 'events')]
    #[ORM\JoinColumn(nullable: false)]
    private ?School $school;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'organiserFor')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $organisedBy;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'registratedFor')]
    private Collection $registratedUsers;

    public function __construct()
    {
        $this->registratedUsers = new ArrayCollection();
    }
    public function __toString(): string
    {
        return $this->name;
    }
    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateTimeStart(): ?\DateTimeInterface
    {
        return $this->dateTimeStart;
    }

    public function setDateTimeStart(\DateTimeInterface $dateTimeStart): self
    {
        $this->dateTimeStart = $dateTimeStart;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getRegistrationDeadline(): ?\DateTimeInterface
    {
        return $this->registrationDeadline;
    }

    public function setRegistrationDeadline(\DateTimeInterface $registrationDeadline): self
    {
        $this->registrationDeadline = $registrationDeadline;

        return $this;
    }

    public function getMaxRegistration(): ?int
    {
        return $this->maxRegistration;
    }

    public function setMaxRegistration(int $maxRegistration): self
    {
        $this->maxRegistration = $maxRegistration;

        return $this;
    }

    public function getInfos(): ?string
    {
        return $this->infos;
    }

    public function setInfos(string $infos): self
    {
        $this->infos = $infos;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

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

    public function getOrganisedBy(): ?User
    {
        return $this->organisedBy;
    }

    public function setOrganisedBy(?User $organisedBy): self
    {
        $this->organisedBy = $organisedBy;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getRegistratedUsers(): Collection
    {
        return $this->registratedUsers;
    }

    public function addRegistratedUser(User $registratedUser): self
    {
        if (!$this->registratedUsers->contains($registratedUser)) {
            $this->registratedUsers[] = $registratedUser;
        }

        return $this;
    }

    public function removeRegistratedUser(User $registratedUser): self
    {
        $this->registratedUsers->removeElement($registratedUser);

        return $this;
    }
}
