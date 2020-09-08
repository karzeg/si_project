<?php
/**
 * UserData entity.
 */
namespace App\Entity;

use App\Repository\UserDataRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserDataRepository::class)
 * @ORM\Table(name="users_data")
 */
class UserData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Firstname.
     *
     * @var string
     *
     * @ORM\Column(type="string",
     *     length=45,
     *     nullable=true)
     *
     * @Assert\Type(type="string")
     * @Assert\Length(
     *     min="3",
     *     max="45",
     * )
     */
    private $firstname;

    /**
     * Lastname.
     *
     * @var string
     *
     * @ORM\Column(type="string",
     *     length=45,
     *     nullable=true)
     *
     * @Assert\Type(type="string")
     * @Assert\Length(
     *     min="3",
     *     max="45",
     * )
     */
    private $lastname;

    /**
     * Getter for Id.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for Firstname.
     *
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Setter for Firstname.
     *
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * Getter for Lastname.
     *
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Setter for Lastname.
     *
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
}
