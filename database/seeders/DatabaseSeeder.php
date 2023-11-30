<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Resource;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Maga',
            'email' => 'maga@gmail.com',
            'password' => Hash::make('0000')
        ]);

        User::factory()->create([
            'name' => 'John',
            'email' => 'john.doe@gmail.com',
            'password' => Hash::make('0000')
        ]);

        Category::factory()->create([
            'name' => 'VST Synthesizer',
        ]);
        Category::factory()->create([
            'name' => 'VST Effect',
        ]);
        Category::factory()->create([
            'name' => 'Sample pack',
        ]);
        Category::factory()->create([
            'name' => 'Formation',
        ]);
        Category::factory()->create([
            'name' => 'Tutoriel',
        ]);

        Tag::factory()->create([
            'name' => 'Acid',
        ]);
        Tag::factory()->create([
            'name' => 'Trance',
        ]);
        Tag::factory()->create([
            'name' => 'Kick',
        ]);
        Tag::factory()->create([
            'name' => 'Bass',
        ]);

        Resource::factory()->hasAttached(Tag::all())->hasAttached(User::find(1))->create([
            'title' => 'VST Serum',
            'resource_author' => 'John',
            'image' => 'resource/1701339481.jpg',
            'slug' => 'vst-serum-1',
            'description' => 'Serum VST, c’est le nom d’un des meilleurs Plugins synthétiseurs du moment. Ce (micro) logiciel de musique offre de réelles fonctionnalités de créations inédites, permettant de composer rapidement avec une grande qualité sonore. Il est présent dans de très nombreuses compositions actuelles et, grâce à sa polyvalence extrême, il s’adapte à de nombreux genres musicaux.',
            'price' => 189,
            'category_id' => 1,
            'link' => "https://xferrecords.com/products/serum/"
        ]);

        Resource::factory()->hasAttached(Tag::all())->hasAttached(User::find(2))->create([
            'title' => 'Formation mastering acid',
            'resource_author' => 'Maga',
            'image' => null,
            'slug' => 'formation-mastering-acid-2',
            'description' => 'Le guide complet pour apprendre à masteriser tes tracks tekno, acid & hardcore.',
            'price' => 69,
            'category_id' => 4,
            'link' => "https://skone.podia.com/"
        ]);

        Resource::factory()->hasAttached(Tag::all())->hasAttached(User::find(2))->create([
            'title' => 'Infinite kick acid sample pack',
            'resource_author' => 'Maga',
            'image' => 'resource/1701339518.jpg',
            'slug' => 'infinite-kick-acid-sample-pack-3',
            'description' => 'Serum VST, c’est le nom d’un des meilleurs Plugins synthétiseurs du moment. Ce (micro) logiciel de musique offre de réelles fonctionnalités de créations inédites, permettant de composer rapidement avec une grande qualité sonore. Il est présent dans de très nombreuses compositions actuelles et, grâce à sa polyvalence extrême, il s’adapte à de nombreux genres musicaux.',
            'price' => 19,
            'category_id' => 3,
            'link' => "https://skone.podia.com/"
        ]);

        Resource::factory()->hasAttached(Tag::all())->hasAttached(User::find(1))->create([
            'title' => 'VST Sylenth',
            'resource_author' => 'John',
            'image' => null,
            'slug' => 'vst-sylenth-4',
            'description' => 'Sylenth1 est créé par la société LennarDigital en 2006. Il s’agit du seul produit de la firme. C’est un synthé soustractif analogique virtuel avec 4 oscillateurs, des filtres et une section de modulation. Assez basique en somme, mais en approfondissant un peu, on trouve la raison de sa présence dans le podium de ce top.',
            'price' => 139,
            'category_id' => 1,
            'link' => "https://www.lennardigital.com/sylenth1/"
        ]);


        /*
        Resource::factory()
            ->count(2)
            ->forCategory([
                'id' => 1,
            ])
            ->create();

        Resource::factory()
            ->forCategory([
                'id' => 3,
            ])
            ->create();
        */
    }
}
