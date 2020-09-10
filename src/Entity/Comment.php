<?php
/**
 * Comment entity
 */
namespace App\Entity;

use App\Repository\CommentRepository;
use App\Entity\Book;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=UserData::class, mappedBy="comment")
     */
    private $userData;

    /**
     * Comment constructor.
     */
    public function __construct()
    {
        $this->userData = new ArrayCollection();
    }

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
     * @return Collection|UserData[]
     */
    public function getUserData(): Collection
    {
        return $this->userData;
    }

    /**
     * @param UserData $userData
     * @return $this
     */
    public function addUserData(UserData $userData): self
    {
        if (!$this->userData->contains($userData)) {
            $this->userData[] = $userData;
            $userData->setComment($this);
        }

        return $this;
    }

    /**
     * @param UserData $userData
     * @return $this
     */
    public function removeUserData(UserData $userData): self
    {
        if ($this->userData->contains($userData)) {
            $this->userData->removeElement($userData);
            // set the owning side to null (unless already changed)
            if ($userData->getComment() === $this) {
                $userData->setComment(null);
            }
        }

        return $this;
    }
}
