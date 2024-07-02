<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\AuthRequestRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AuthRequestRepository::class)]
class AuthRequest
{

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\Column(type: "uuid", unique: true)]
    #[ORM\CustomIdGenerator(class: "doctrine.uuid_generator")]
    private ?string $id = null;

    #[Groups(['create'])]
    #[ORM\Column(type: "text")]
    #[Assert\NotBlank(groups: ['create'])]
    #[Assert\Length(min: 1, max: 50, groups: ['create'])]
    private string $identifier;

    #[ORM\Column]
    private DateTime $created;

    #[ORM\Column]
    private DateTime $expired;

    #[ORM\Column(nullable: true)]
    private ?DateTime $authenticated = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    public function getExpired(): DateTime
    {
        return $this->expired;
    }

    public function setExpired(DateTime $expired): void
    {
        $this->expired = $expired;
    }

    public function getAuthenticated(): ?DateTime
    {
        return $this->authenticated;
    }

    public function setAuthenticated(?DateTime $authenticated): void
    {
        $this->authenticated = $authenticated;
    }
}
