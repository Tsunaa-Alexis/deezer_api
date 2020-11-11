<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtistRepository::class)
 */
class Artist
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $share;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $picture_small;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $picture_medium;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $picture_big;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $picture_xl;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nm_album;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_fan;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $radio;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $tracklist;

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

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getShare(): ?string
    {
        return $this->share;
    }

    public function setShare(?string $share): self
    {
        $this->share = $share;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPictureSmall(): ?string
    {
        return $this->picture_small;
    }

    public function setPictureSmall(?string $picture_small): self
    {
        $this->picture_small = $picture_small;

        return $this;
    }

    public function getPictureMedium(): ?string
    {
        return $this->picture_medium;
    }

    public function setPictureMedium(?string $picture_medium): self
    {
        $this->picture_medium = $picture_medium;

        return $this;
    }

    public function getPictureBig(): ?string
    {
        return $this->picture_big;
    }

    public function setPictureBig(?string $picture_big): self
    {
        $this->picture_big = $picture_big;

        return $this;
    }

    public function getPictureXl(): ?string
    {
        return $this->picture_xl;
    }

    public function setPictureXl(?string $picture_xl): self
    {
        $this->picture_xl = $picture_xl;

        return $this;
    }

    public function getNmAlbum(): ?int
    {
        return $this->nm_album;
    }

    public function setNmAlbum(?int $nm_album): self
    {
        $this->nm_album = $nm_album;

        return $this;
    }

    public function getNbFan(): ?int
    {
        return $this->nb_fan;
    }

    public function setNbFan(?int $nb_fan): self
    {
        $this->nb_fan = $nb_fan;

        return $this;
    }

    public function getRadio(): ?bool
    {
        return $this->radio;
    }

    public function setRadio(?bool $radio): self
    {
        $this->radio = $radio;

        return $this;
    }

    public function getTracklist(): ?string
    {
        return $this->tracklist;
    }

    public function setTracklist(?string $tracklist): self
    {
        $this->tracklist = $tracklist;

        return $this;
    }
}
