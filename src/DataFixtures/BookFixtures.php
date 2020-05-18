<?php
/**
 * Book fixture.
 */

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Persistence\ObjectManager;

/**
 * Class BookFixtures.
 */
class BookFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'books', function ($i) {
            $book = new Book();
            $book->setTitle($this->faker->word);
            $book->setDescription($this->faker->sentence);

            return $book;
        });

        $manager->flush();
    }
}