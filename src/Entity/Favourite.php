<?php
/**
 * Favourite entity.
 */

namespace App\Entity;

use App\Repository\FavouriteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavouriteRepository::class)
 * @ORM\Table(name="favourites")
 */
class Favourite
{
    /**
    * Primary key.
     *
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * Getter for Id.
    *
    * @return int|null Result
    */
    public function getId(): ?int
    {
        return $this->id;
    }
}
