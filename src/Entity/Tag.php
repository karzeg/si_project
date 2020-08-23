<?php
/**
 * Tag entity.
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
 * @UniqueEntity(fields={"title"})
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
     * Title.
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=45
     *)
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="64",
     * )
     */
    private $title;

    /**
     * Books.
     *
     * @var \Doctrine\Common\Collections\ArrayCollection|\App\Entity\Book[] Books
     *
     * @ORM\ManyToMany(targetEntity=Book::class, mappedBy="tags")
     */
    private $book;

    /**
     * Tag constructor.
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
     * Getter for Title.
     *
     * @return string|null Title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Setter for Title.
     *
     * @param string $title Title
     *
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Getter for books.
     *
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->book;
    }

    /**
     * Add book to collection.
     *
     * @param Book $book
     *
     */
    public function addBook(Book $book): void
    {
        if (!$this->book->contains($book)) {
            $this->book[] = $book;
            $book->addTag($this);
        }
    }

    /**
     * Remove book from collection.
     *
     * @param Book $book
     *
     */
    public function removeBook(Book $book): void
    {
        if ($this->book->contains($book)) {
            $this->book->removeElement($book);
            $book->removeTag($this);
        }
    }
}
