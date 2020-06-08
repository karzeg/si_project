<?php
/**
 * Book fixtures
 */

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class BookFixtures
 */
class BookFixtures extends AbstractBaseFixtures
{
    /**
     * Load data
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'books', function ($i) {
            $book = new Book();
            $book->setTitle($this->faker->word);
            $book->setDescription($this->faker->sentence);
            $book->setAuthor($this->getRandomReference('authors'));
            $book->setCategory($this->getRandomReference('categories'));

            return $book;
        });

        $manager->flush();
    }
    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependencies(): array
    {
        return [AuthorFixtures::class, CategoryFixtures::class];
    }
}
