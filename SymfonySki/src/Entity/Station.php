<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: StationRepository::class)]
#[UniqueEntity(fields: ['name'], message: 'There is already an account with this name')]
class Station implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $name = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'station_id', targetEntity: Piste::class)]
    private Collection $pistes;

    #[ORM\OneToMany(mappedBy: 'station_id', targetEntity: Telesiege::class)]
    private Collection $telesieges;

    #[ORM\ManyToOne(inversedBy: 'stations')]
    private ?domaine $domaine_id = null;

    public function __construct()
    {
        $this->pistes = new ArrayCollection();
        $this->telesieges = new ArrayCollection();
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->name;
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

    /**
     * @return Collection<int, Piste>
     */
    public function getPistes(): Collection
    {
        return $this->pistes;
    }

    public function addPiste(Piste $piste): self
    {
        if (!$this->pistes->contains($piste)) {
            $this->pistes->add($piste);
            $piste->setStationId($this);
        }

        return $this;
    }

    public function removePiste(Piste $piste): self
    {
        if ($this->pistes->removeElement($piste)) {
            // set the owning side to null (unless already changed)
            if ($piste->getStationId() === $this) {
                $piste->setStationId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Telesiege>
     */
    public function getTelesieges(): Collection
    {
        return $this->telesieges;
    }

    public function addTelesiege(Telesiege $telesiege): self
    {
        if (!$this->telesieges->contains($telesiege)) {
            $this->telesieges->add($telesiege);
            $telesiege->setStationId($this);
        }

        return $this;
    }

    public function removeTelesiege(Telesiege $telesiege): self
    {
        if ($this->telesieges->removeElement($telesiege)) {
            // set the owning side to null (unless already changed)
            if ($telesiege->getStationId() === $this) {
                $telesiege->setStationId(null);
            }
        }

        return $this;
    }

    public function getDomaineId(): ?domaine
    {
        return $this->domaine_id;
    }

    public function setDomaineId(?domaine $domaine_id): self
    {
        $this->domaine_id = $domaine_id;

        return $this;
    }
}
