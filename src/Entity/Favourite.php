<?php
/**
 * Favourite entity.
 */

namespace App\Entity;

use App\Repository\FavouriteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavouriteRepository::class)
 * @ORM\Table(name="favourites")
 */
class Favourite
{
    /**
    * Primary key.
     *
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="favourites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity=UserData::class, inversedBy="favourites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userData;

    /**
    * Getter for Id.
    *
    * @return int|null Result
    */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Book|null
     */
    public function getBook(): ?Book
    {
        return $this->book;
    }

    /**
     * @param Book|null $book
     *
     * @return $this
     */
    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    /**
     * @return UserData|null
     */
    public function getUserData(): ?UserData
    {
        return $this->userData;
    }

    /**
     * @param UserData|null $userData
     *
     * @return $this
     */
    public function setUserData(?UserData $userData): self
    {
        $this->userData = $userData;

        return $this;
    }
}
