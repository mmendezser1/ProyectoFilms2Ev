<?php

namespace App\DataFixtures;
use Faker;
use App\Entity\Film;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);       
        
        for ($i =0; $i<20;$i++){
            
            $jobFaker = Faker\Factory::create();
            
            $category = new Category();
            
            $film = new Film();
            $film->setTittle($jobFaker->company);
            $film->setDescription($jobFaker->text);
            $film ->setDirector($jobFaker->company);
            $film->setPicture("https://hpicsum.photos/200/300");
            $film ->setTrailerLink("https://youtube.com/deadpool2");  
            
            $manager->persist($film);

        
}
$manager->flush();
    }
        }
