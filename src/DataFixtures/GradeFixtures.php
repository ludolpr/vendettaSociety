<?php

namespace App\DataFixtures;

use App\Entity\Grade;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GradeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // créer 20 grades
        for ($i = 0; $i < 20; $i++) {
            $grade = new Grade();
            $grade->setName('name ' . $i);
            $grade->setDetails('details ' . $i);
            $manager->persist($grade);
        }
        $manager->flush();
    }
}
