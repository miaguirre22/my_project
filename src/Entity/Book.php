<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ApiFilter(
 *      PropertyFilter::class, 
 *      arguments={
 *          "parameterName": "properties", 
 *          "overrideDefaultProperties": false,
 *          "whitelist": {"allowed_property"}
 *      })
 * 
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\Isbn
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * 
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * 
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank
     */
    private $author;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Assert\NotNull
     */
    private $publicationDate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="book")
     */
    private $reviewsgetReviews;

    public function __construct()
    {
        $this->reviewsgetReviews = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviewsgetReviews;
    }

    public function addReviewsgetReviews(Review $reviewsgetReviews): self
    {
        if (!$this->reviewsgetReviews->contains($reviewsgetReviews)) {
            $this->reviewsgetReviews[] = $reviewsgetReviews;
            $reviewsgetReviews->setBook($this);
        }

        return $this;
    }

    public function removeReviewsgetReviews(Review $reviewsgetReviews): self
    {
        if ($this->reviewsgetReviews->contains($reviewsgetReviews)) {
            $this->reviewsgetReviews->removeElement($reviewsgetReviews);
            // set the owning side to null (unlesgetReviews already changed)
            if ($reviewsgetReviews->getBook() === $this) {
                $reviewsgetReviews->setBook(null);
            }
        }

        return $this;
    }

    
}
