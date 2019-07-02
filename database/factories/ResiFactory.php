<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Resi;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Resi::class, function (Faker $faker) {
    return [
        'tglOrder' => $faker->date,
        'invoice' => Str::random(10),
        'nama' => $faker->name,
        'noHp' => Str::random(12),
        'produk'=> $faker->paragraph,
        'provinsi'=>$faker->city,
        'kota'=> $faker->city,
        'kecamatan'=> $faker->city,
        'alamat'=> $faker->city,
        'resi'=>Str::random(10),
        'email_reseller'=>Str::random(10),
        'nama_reseller'=>Str::random(12),
        'kurir'=>Str::random(3),


    ];
});
