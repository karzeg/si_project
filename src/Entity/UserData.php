<?php
/**
 * UserData entity
 */
namespace App\Entity;

use App\Repository\UserDataRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserData
 *
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users_data")
 */
class UserData
{
    /**
     * Primary key
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Firstname
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=45)
     */
    private $firstname;

    /**
     * Lastname
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
     * Email
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=60
     *)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="userData", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Favourite::class, mappedBy="userData")
     */
    private $favourites;

    /**
     * UserData constructor
     */
    public function __construct()
    {
        $this->favourites = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     *
     * @return $this
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     *
     * @return $this
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        // set the owning side of the relation if necessary
        if ($user->getUserData() !== $this) {
            $user->setUserData($this);
        }

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
            $favourite->setUserData($this);
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
            if ($favourite->getUserData() === $this) {
                $favourite->setUserData(null);
            }
        }

        return $this;
    }
}
