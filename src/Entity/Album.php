<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlbumRepository::class)
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $upc;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $share;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $cover;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $cover_small;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $cover_medium;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $cover_big;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $cover_xl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fans;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $tracklist;

    /**
     * @ORM\ManyToOne(targetEntity=Artist::class)
     */
    private $artist;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUpc(): ?string
    {
        return $this->upc;
    }

    public function setUpc(?string $upc): self
    {
        $this->upc = $upc;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
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

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getCoverSmall(): ?string
    {
        return $this->cover_small;
    }

    public function setCoverSmall(?string $cover_small): self
    {
        $this->cover_small = $cover_small;

        return $this;
    }

    public function getCoverMedium(): ?string
    {
        return $this->cover_medium;
    }

    public function setCoverMedium(?string $cover_medium): self
    {
        $this->cover_medium = $cover_medium;

        return $this;
    }

    public function getCoverBig(): ?string
    {
        return $this->cover_big;
    }

    public function setCoverBig(?string $cover_big): self
    {
        $this->cover_big = $cover_big;

        return $this;
    }

    public function getCoverXl(): ?string
    {
        return $this->cover_xl;
    }

    public function setCoverXl(?string $cover_xl): self
    {
        $this->cover_xl = $cover_xl;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getFans(): ?int
    {
        return $this->fans;
    }

    public function setFans(?int $fans): self
    {
        $this->fans = $fans;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

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

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }
}
