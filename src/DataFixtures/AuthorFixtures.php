<?php
/**
 * Author fixture
 */

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Persistence\ObjectManager;

/**
 * Class AuthorFixtures
 */
class AuthorFixtures extends AbstractBaseFixtures
{
    /**
     * Load data
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'authors', function ($i) {
            $author = new Author();
            $author->setFirstname($this->faker->word);
            $author->setLastname($this->faker->word);

            return $author;
        });

        $manager->flush();
    }
}
