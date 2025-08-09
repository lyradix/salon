<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();

             // Exécuter le script SQL data.sql après l'insertion de l'utilisateur
 
        $connection = $manager->getConnection();
        $sqlFile = __DIR__ . '/Data/data.sql'; // Assurez-vous que le chemin est correct

        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            $connection->executeStatement($sql);
        } else {
            throw new \RuntimeException("Le fichier SQL $sqlFile est introuvable.");
        }
    }
}
