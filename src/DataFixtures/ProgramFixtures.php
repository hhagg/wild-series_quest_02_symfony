<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        'Walking Dead',
        'Die Hard',
        'Man of steel',
        'One piece',
        'Jumanji',
    ];
    public function load(ObjectManager $manager)
    {

        $program = new Program();
        $program->setTitle('Walking Dead');
        $program->setSynopsis('Zombies invade the earth');
        $program->setCategory($this->getReference('category_Horror'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Die Hard');
        $program->setSynopsis('Return to Hell');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Man of steel');
        $program->setSynopsis('Superman returns');
        $program->setCategory($this->getReference('category_Fantastic'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('One piece');
        $program->setSynopsis('Zo island');
        $program->setCategory($this->getReference('category_Animation'));
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Jumanji');
        $program->setSynopsis('The Next Level');
        $program->setCategory($this->getReference('category_Adventure'));
        $manager->persist($program);

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }


}