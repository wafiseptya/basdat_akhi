<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      for ($i=0; $i < 1000; $i++) { 
        DB::table('logs')->insert([
          'ipAddress' => $faker->ipv4,
          'oldData' => json_encode($faker->words(30)),
          'newData' => json_encode($faker->words(30)),
          'user_id' => $this->getID()
        ]);
      }
      
    }
    private function getID() {
      $user = \App\User::inRandomOrder()->first();
      return $user->id;
    }
}
