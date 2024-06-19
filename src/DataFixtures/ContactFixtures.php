<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // créer 20 message de contacts
        for ($i = 0; $i < 20; $i++) {
            $contact = new Contact();
            $contact->setTitle('title ' . $i);
            $contact->setMessage(mt_rand(10, 100));
            $manager->persist($contact);
        }
        $manager->flush();
    }
}
