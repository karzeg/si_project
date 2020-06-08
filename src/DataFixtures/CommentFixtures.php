<?php
/**
 * Comment fixtures
 */

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Persistence\ObjectManager;

/**
 * Class CommentFixtures
 */
class CommentFixtures extends AbstractBaseFixtures
{
    /**
     * Load data
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'comments', function ($i) {
            $comment = new Comment();
            $comment->setContent($this->faker->sentence);

            return $comment;
        });

        $manager->flush();
    }

}