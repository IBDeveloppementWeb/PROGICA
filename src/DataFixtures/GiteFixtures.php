<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Gite;
use App\Entity\Service;
use App\Entity\Equipement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GiteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');

        // Créer 10 Equipements

        $equipements = [];
        $equipement1 = new Equipement;
        $equipement1->setNom("Piscine");

        $manager->persist($equipement1);

        $equipement2 = new Equipement;
        $equipement2->setNom("Lave-Vaisselle");

        $manager->persist($equipement2);

        $equipement3 = new Equipement;
        $equipement3->setNom("Lave-Linge");

        $manager->persist($equipement3);

        $equipement4 = new Equipement;
        $equipement4->setNom("WIFI");

        $manager->persist($equipement4);

        $equipement5 = new Equipement;
        $equipement5->setNom("Jacuzzi");

        $manager->persist($equipement5);

        $equipement6 = new Equipement;
        $equipement6->setNom("Linge de Maison");

        $manager->persist($equipement6);

        $equipement7 = new Equipement;
        $equipement7->setNom("Lit bébé");

        $manager->persist($equipement7);

        $equipement8 = new Equipement;
        $equipement8->setNom("Barbecue");

        $manager->persist($equipement8);

        $equipement9 = new Equipement;
        $equipement9->setNom("Climatisation");

        $manager->persist($equipement9);

        array_push($equipements, $equipement1, $equipement2, $equipement3, $equipement4, $equipement5, $equipement6, $equipement7, $equipement8, $equipement9);

        $manager->flush();

        // Créer 2 Services

        $services = [];

        $service = new Service;
        $service->setNom("Location de Vélo")
            ->setTarif(20);

        $manager->persist($service);

        $service1 = new Service;
        $service1->setNom("Ménage")
            ->setTarif(50);

        $manager->persist($service1);

        array_push($services, $service, $service1);

        $manager->flush();

        for ($i = 1; $i < 50; $i++) {
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
                ->setAddAt($faker->dateTimeThisYear())
                ->setImage('https://picsum.photos/400/200?random=' . $faker->numberBetween(2, 500))
                ->addEquipement($faker->randomElement($equipements))
                ->addService($faker->randomElement($services));

            $manager->persist($gite);
        }


        $manager->flush();
    }
}
