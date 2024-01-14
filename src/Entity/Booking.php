<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Room::class, inversedBy: 'bookings')]
    private Collection $host;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'bookings')]
    private Collection $voyagers;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $update_at = null;

    #[ORM\Column(length: 10)]
    private ?string $reference = null;

    public function __construct()
    {
        $this->host = new ArrayCollection();
        $this->voyagers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Room>
     */
    public function getHost(): Collection
    {
        return $this->host;
    }

    public function addHost(Room $host): static
    {
        if (!$this->host->contains($host)) {
            $this->host->add($host);
        }

        return $this;
    }

    public function removeHost(Room $host): static
    {
        $this->host->removeElement($host);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getVoyagers(): Collection
    {
        return $this->voyagers;
    }

    public function addVoyager(User $voyager): static
    {
        if (!$this->voyagers->contains($voyager)) {
            $this->voyagers->add($voyager);
        }

        return $this;
    }

    public function removeVoyager(User $voyager): static
    {
        $this->voyagers->removeElement($voyager);

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): static
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): static
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(\DateTimeInterface $update_at): static
    {
        $this->update_at = $update_at;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }
}
