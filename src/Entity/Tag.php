<?php
/**
 * Tag entity
 */

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Tag
 *
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 * @ORM\Table(name="tags")
 *
 * @UniqueEntity(fields={"name"})
 */
class Tag
{
    /**
     * Primary key
     *
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Name
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=45
     *)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Book::class, inversedBy="tags")
     */
    private $book;

    /**
     * Tag constructor
     */
    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

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
     * Getter for Name
     *
     * @return string|null Name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Setter for Name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    /**
     * @param Book $book
     *
     * @return $this
     */
    public function addBook(Book $book): self
    {
        if (!$this->book->contains($book)) {
            $this->book[] = $book;
        }

        return $this;
    }

    /**
     * @param Book $book
     *
     * @return $this
     */
    public function removeBook(Book $book): self
    {
        if ($this->book->contains($book)) {
            $this->book->removeElement($book);
        }

        return $this;
    }
}
