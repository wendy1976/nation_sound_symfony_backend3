<?php

namespace App\Entity;

use App\Repository\NotificationInfoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: NotificationInfoRepository::class)]
#[Broadcast]
class NotificationInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $body = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $internalLink = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): static
    {
        $this->body = $body;

        return $this;
    }

    public function getInternalLink(): ?string
    {
        return $this->internalLink;
    }

    public function setInternalLink(?string $internalLink): static
    {
        $this->internalLink = $internalLink;

        return $this;
    }
}
