<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => 1 ,
        'desc' => $faker->text,
        'price' => $faker->randomFloat,
        'slug' => $faker->firstNameMale .'-'.$faker->lastName .'-'.$faker->cityPrefix,
        'image' => $faker->image('public/products',400,300, 'animals', false),
         'category' => 'test',
    ];
});
