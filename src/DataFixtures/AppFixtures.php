<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Room;
use App\Entity\User;
use App\Entity\Equipment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Set admin
        $admin = new User();
        $admin->setEmail('admin@admin.fr')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('$2y$13$wqXiXE8U6QhYtIRJFedLA.MkNVmDzn89jVz5CBYENUOwHfAlyYNG2');
        $manager->persist($admin);

        // Set hosts
        $hosts = [];
        for ($i=0; $i < 8; $i++) { 
            $host = new User();
            $host->setEmail('host' . $i . '@host.fr')
                ->setRoles(['ROLE_HOST'])
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setPassword('$2y$13$wqXiXE8U6QhYtIRJFedLA.MkNVmDzn89jVz5CBYENUOwHfAlyYNG2');
            $manager->persist($host);
            array_push($hosts, $host);
        }

        // Set equipments
        $equipments = ['wifi', 'tv', 'climatiseur', 'lave-linge', 'lave-vaisselle', 'piscine', 'jacuzzi', 'parking'];
        $equipmentArray = [];
        for ($i=0; $i < count($equipments); $i++) { 
            $equipment = new Equipment();
            $equipment->setName($equipments[$i]);
            $manager->persist($equipment);
            array_push($equipmentArray, $equipment);
        }

        // Set rooms
        $cities = ['paris', 'las vegas', 'kyoto', 'sydney', 'hong kong'];
        for ($i = 0; $i < 100; $i++) {
            
            $room = new Room();
            $room->setName($faker->words(3, true))
                ->setSlug($faker->slug)
                ->setCity($faker->randomElement($cities))
                ->addEquipment($faker->randomElement($equipmentArray))
                ->addEquipment($faker->randomElement($equipmentArray))
                ->setDescription($faker->paragraphs(3, true))
                ->setHost($faker->randomElement($hosts))
                ->setPrice($faker->numberBetween(150, 1500))
                ->setCreatedAt(new \DateTime('now'))
                ->setUpdatedAt(new \DateTime('now'));

            // Add favorites to admin
            if ($i < 10) {
                $admin->addFavorite($room);
            }

            // Set users with favorites
            if ($i > 70) {
                    $user = new User();
                    $user->setEmail('user' . $i . '@user.fr')
                        ->setRoles(['ROLE_USER'])
                        ->setFirstname($faker->firstName)
                        ->setLastname($faker->lastName)
                        ->setPassword('$2y$13$wqXiXE8U6QhYtIRJFedLA.MkNVmDzn89jVz5CBYENUOwHfAlyYNG2')
                        ->addFavorite($room);
                    $manager->persist($user);
            }
            $manager->persist($room);
        }

        // Flush
        $manager->flush();
    }
}
