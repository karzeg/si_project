<?php
/**
 * UserData fixture
 */

namespace App\DataFixtures;

use App\Entity\UserData;
use Doctrine\Persistence\ObjectManager;

/**
 * Class UserDataFixtures
 */
class UserDataFixtures extends AbstractBaseFixtures
{
    /**
     * Load data
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'userdata', function ($i) {
            $userdata = new UserData();
            $userdata->setFirstname($this->faker->word);
            $userdata->setLastname($this->faker->word);
            $userdata->setEmail($this->faker->word);

            return $userdata;
        });

        $manager->flush();
    }
}
