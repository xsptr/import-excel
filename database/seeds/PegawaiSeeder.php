<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;


class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker::create('id_ID');

    	for($i = 1; $i <= 10; $i++){

        // insert data ke table pegawai menggunakan faker
        DB::table('pegawai')->insert([
        	'nama' => $faker->name,
        	'jabatan' => $faker->jobTitle,
        	'umur' => $faker->numberBetween(25,50),
        	'alamat' => $faker->address
        	]);
    	}
    }
}
