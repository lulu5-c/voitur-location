<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
   
    
    function run()
        {
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234567890'),
            ]);

            $categories = ['Berline','Crossovers', 'Limousines','Peugeot','Range rover'];
            for($i=0; $i<5 ; $i++){
                DB::table('categories')->insert([
                    'name' =>$categories[$i]
                ]);
            }

            $marques = ['FERRARI','FIAT', 'AUDI','BENTLEY','DS'];
            $image = ['b1.jpg','b2.jpeg', 'b3.jpg','b4.jpg','b5.jpg'];

            for($i=0; $i<5 ; $i++){
                DB::table('voitures')->insert([
                    'marque' =>$marques[$i],
                    'description' => "La berline est une catégorie de carrosserie automobile. Elle correspond à une auto de taille moyenne, mesurant le plus souvent entre 4 et 5 mètres de long, avec un toit rigide et fixe (à la différence d'un coupé-cabriolet), quatre portes, quatre fenêtres et au moins quatre places à bord.",
                    'image'=>$image[$i],
                    'categorie_id' => 1,
                    'prix' => 50952.0,
                    'porte' => 5,
                    'energie' => 'Essence',
                    'boite' => 'automatique',
                ]);
            }
            $marque = ['HONDA','FORD', 'MAZDA','NISSAN','MINI'];
            $images = ['c1.jpg','c2.jpg', 'c3.jpg','c6.jpg','c7.jpg'];

            for($i=0; $i<5 ; $i++){
                DB::table('voitures')->insert([
                    'marque' =>$marque[$i],
                    'description' => "Parmi les SUV intégrant le top 10, les Peugeot 3008 et le Renault Captur sortent du lot en matière de confort. Comparés aux autres véhicules du classement, ces deux SUV affichent un niveau de confort largement supérieur, même si le titre du SUV le plus confortable revient au Renault Captur.",
                    'image'=>$images[$i],
                    'categorie_id' => 2,
                    'prix' => 90952.0,
                    'porte' => 5,
                    'energie' => 'Essence',
                    'boite' => 'Mecanique',
                ]);
            }
            
            $imag = ['l1.jpg','m2.jpg', 'm3.jpg','m4.jpg','l5.jpeg'];
            for($i=0; $i<5 ; $i++){
                DB::table('voitures')->insert([
                    'marque' =>$marques[$i],
                    'description' => "Une limousine, ou limousine en abrégé, est un grand véhicule de luxe conduit par un chauffeur avec une cloison entre l'habitacle du conducteur et l'habitacle des passagers. Une berline de luxe à très long empattement conduite par un chauffeur professionnel s'appelle une limousine allongée.",
                    'image'=>$imag[$i],
                    'categorie_id' => 3,
                    'prix' => 70952.0,
                    'porte' => 2,
                    'energie' => 'Diesel',
                    'boite' => 'automatique',
                ]);
            }

            $ima = ['p1.jpg','p2.jpg', 'p3.jpg','p4.jpg','p5.png'];
            for($i=0; $i<5 ; $i++){
                DB::table('voitures')->insert([
                    'marque' =>$marque[$i],
                    'description' => " Peugeot : des véhicules fiables et une marque emblématique jouissant d'une longévité exceptionnelle. Une large offre adaptée à tous les goûts : découvrez les modèles et finitions les plus iconiques .",
                    'image'=>$ima[$i],
                    'categorie_id' => 4,
                    'prix' => 80952.0,
                    'porte' => 5,
                    'energie' => 'Essence',
                    'boite' => 'Mecanique',
        
                ]);
            }

            $ima = ['1.jpg','3.jpg', '4.jpg','5.jpg','6.jpg'];
            for($i=0; $i<5 ; $i++){
                DB::table('voitures')->insert([
                    'marque' =>$marques[$i],
                    'description' => " Le Range Rover est une gamme d'automobiles tout-terrain/SUV luxueux produits par le constructeur automobile britannique Land Rover depuis 1970.",
                    'image'=>$ima[$i],
                    'categorie_id' => 5,
                    'prix' => 250952.0,
                    'porte' => 5,
                    'energie' => 'Essence',
                    'boite' => 'Mecanique',
                ]);
            }

    }
}