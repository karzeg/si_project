<?php
/**
 * Author entity.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Author.
 *
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 * @ORM\Table(name="authors")
 */
class Author
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
     * Firstname.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=45
     *)
     */
    private $firstname;

    /**
     * Lastname.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=45
     *)
     */
    private $lastname;

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
     * Getter for Firstname.
     *
     * @return string|null Firstname
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Setter for Firstname.
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * Getter for Lastname.
     *
     * @return string|null $lastname
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Setter for Lastname.
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
}
