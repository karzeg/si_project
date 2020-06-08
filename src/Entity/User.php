<?php
/**
 * User entity
 */
namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 *
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User
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
     * Login
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=40
     *)
     */
    private $login;

    /**
     * Password
     *
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=255
     *)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity=UserData::class, inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userData;

    /**
     * @ORM\Column(type="json")
     */
    private $role = [];

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
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param string $login
     *
     * @return $this
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return UserData|null
     */
    public function getUserData(): ?UserData
    {
        return $this->userData;
    }

    /**
     * @param UserData $userData
     *
     * @return $this
     */
    public function setUserData(UserData $userData): self
    {
        $this->userData = $userData;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getRole(): ?array
    {
        return $this->role;
    }

    /**
     * @param array $role
     *
     * @return $this
     */
    public function setRole(array $role): self
    {
        $this->role = $role;

        return $this;
    }
}
