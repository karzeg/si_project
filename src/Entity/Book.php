<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Book.
 *
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 * @ORM\Table(name="books")
 */
class Book
{
    /**
     * Primary key.
     *
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * Title
    *
    * @var string
    *
    * @ORM\Column(
    *     type="string",
    *     length=45
    *)
    */
    private $title;

    /**
    * Description
    *
    * @var string
    *
    * @ORM\Column(
    *     type="string",
    *     length=200
    *)
    */
    private $description;

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
    * Getter for Title
    *
    * @return string|null Title
    */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
    * Setter for Title
    */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
    * Getter for Description
    *
    * @return string|null $description
    */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
    * Setter for Description
    */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
