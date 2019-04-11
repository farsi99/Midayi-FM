<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Actualite;
use App\Entity\Categorie;
use Cocur\Slugify\Slugify;
use App\Entity\Commentaire;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 5; $i++) {
            $categorie = new Categorie();
            $categorie->setLibelle($faker->sentence());
            $categorie->setDescription($faker->paragraph());
            $manager->persist($categorie);

            for ($j = 0; $j < mt_rand(4, 8); $j++) {
                $actu = new Actualite();
                $actu->setTitre($faker->sentence());
                $actu->setCategorie($categorie);
                $actu->setAuteur($faker->name());
                $actu->setContenu($faker->paragraph());
                $actu->setImage($faker->imageUrl(300, 300));
                $actu->setLead($faker->sentence());
                $slug = new Slugify();
                $slg = $slug->slugify($actu->getTitre());
                $actu->setSlug($slg);
                $actu->setEtatPub("1");
                $actu->setCreatedAt($faker->dateTimeBetween('- 6 months'));
                $manager->persist($actu);

                for ($k = 0; $k < mt_rand(4, 10); $k++) {
                    $comment = new Commentaire();
                    $comment->setActualite($actu);
                    $comment->setAuteur($faker->name);
                    $comment->setTitre($faker->sentence());
                    $comment->setDescription($faker->paragraph());
                    $now = new \DateTime();
                    $days = $now->diff($actu->getCreatedAt())->days;
                    $comment->setPublication($faker->dateTimeBetween('-' . $days . 'days'));
                    $manager->persist($comment);
                }
            }
        }
        $manager->flush();
    }
}
