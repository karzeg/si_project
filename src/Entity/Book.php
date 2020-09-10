<?php
/**
 * Book entity.
 */

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Book
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
    * Title.
    *
    * @var string
    *
    * @ORM\Column(
    *     type="string",
    *     length=255
    *)
     * @Assert\Length(
     *     min="3",
     *     max="255",
     * )
    */
    private $title;

    /**
    * Description
    *
    * @var string
    *
    * @ORM\Column(
    *     type="string",
    *     length=255
    *)
     * @Assert\Length(
     *     min="3",
     *     max="255",
     * )
    */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Author::class, inversedBy="books")
     *
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="books")
     *
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Favourite::class, mappedBy="book")
     */
    private $favourites;

    /**
     * Comments.
     *
     * @var array
     *
     * @ORM\OneToMany(
     *     targetEntity=Comment::class,
     *     mappedBy="book",
     *     orphanRemoval=true
     * )
     *
     * @Assert\All({
     * @Assert\Type(type="App\Entity\Comment")
     * })
     */
    private $comments;

    /**
     * Tags.
     *
     * @var array
     *
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="book")
     *
     * @ORM\JoinTable(name="books_tags")
     */
    private $tags;

    /**
     * Book constructor
     */
    public function __construct()
    {
        $this->favourites = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    /**
    * Getter for Id
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

    /**
     * @return Author|null
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param Author|null $author
     *
     * @return $this
     */
    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     *
     * @return $this
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Favourite[]
     */
    public function getFavourites(): Collection
    {
        return $this->favourites;
    }

    /**
     * @param Favourite $favourite
     *
     * @return $this
     */
    public function addFavourite(Favourite $favourite): self
    {
        if (!$this->favourites->contains($favourite)) {
            $this->favourites[] = $favourite;
            $favourite->setBook($this);
        }

        return $this;
    }

    /**
     * @param Favourite $favourite
     *
     * @return $this
     */
    public function removeFavourite(Favourite $favourite): self
    {
        if ($this->favourites->contains($favourite)) {
            $this->favourites->removeElement($favourite);
            // set the owning side to null (unless already changed)
            if ($favourite->getBook() === $this) {
                $favourite->setBook(null);
            }
        }

        return $this;
    }

    /**
     * Getter for comments.
     *
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * Add comment.
     *
     * @param Comment $comment
     *
     * @return $this
     */
    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setBook($this);
        }

        return $this;
    }

    /**
     * Remove comment.
     *
     * @param Comment $comment
     *
     * @return $this
     */
    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getBook() === $this) {
                $comment->setBook(null);
            }
        }

        return $this;
    }

    /**
     * Getter for tags.
     *
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * Add tag to coletion.
     *
     * @param Tag $tag
     *
     */
    public function addTag(Tag $tag): void
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }
    }

    /**
     * Remove tag from collection.
     *
     * @param Tag $tag
     *
     */
    public function removeTag(Tag $tag): void
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
        }
    }
}
