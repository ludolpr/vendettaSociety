<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class JobFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        // créer 20 jobs
        for ($i = 0; $i < 20; $i++) {
            $job = new Job();
            $job->setName('name ' . $i);
            $job->setDescription(mt_rand(10, 100));
            $job->setAvailable((bool)mt_rand(0, 1));
            $manager->persist($job);
        }
        $manager->flush();
    }
}
