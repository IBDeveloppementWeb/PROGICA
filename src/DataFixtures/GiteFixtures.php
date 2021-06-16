<?php

namespace App\DataFixtures;

use App\Entity\Gite;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GiteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $gite = new Gite;
            $gite
                ->setNom('Gite n°' . $i)
                ->setAdresse($faker->streetAddress())
                ->setVille($faker->city())
                ->setCodePostal($faker->postcode())
                ->setSurface($faker->numberBetween(50, 300))
                ->setChambre($faker->numberBetween(1, 10))
                ->setCouchage($faker->numberBetween(2, 20))
                ->setAnimaux($faker->boolean())
                ->setTarifAnimaux($faker->randomFloat(0, 5, 10))
                ->setTarifBasseSaison($faker->randomFloat(0, 300, 600))
                ->setTarifHauteSaison($faker->randomFloat(0, 500, 1200))
                ->setDescription($faker->paragraphs(5, true))
                ->setImage('https://picsum.photos/400/200?random=' . $faker->numberBetween(2, 500));

            $manager->persist($gite);
        }


        $manager->flush();
    }
}
