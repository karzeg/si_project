<?php
/**
 * Comment entity
 */
namespace App\Entity;

use App\Repository\CommentRepository;
use App\Entity\Book;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Comment
 *
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 * @ORM\Table(name="comments")
 */
class Comment
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
     * Content
     *
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity=UserData::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userData;

    /**
     * Getter for id
     *
     * @return int|null Result
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for Content
     *
     * @return string|null Content
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Setter for Content
     *
     * @param string $content Content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return \App\Entity\Book|null
     */
    public function getBook(): ?Book
    {
        return $this->book;
    }

    /**
     * @param \App\Entity\Book|null $book
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
