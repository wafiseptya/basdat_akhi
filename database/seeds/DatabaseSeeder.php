<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(KabupatenTableSeeder::class);
        $this->call(KendaraanSeeder::class);
        $this->call(mataAnggaran::class);
        $this->call(WaktuPerjalanan::class);
        $this->call(PegawaiSeeder::class);
    }
}
