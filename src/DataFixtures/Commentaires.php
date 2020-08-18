<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity;

class Commentaires extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $product = new Product();
         $manager->persist($product);
         $product->setMessage('udsifhlifqs');
         $product->setPseudo('kiki');

        $manager->flush();
    }
}
