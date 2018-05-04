<?php
use App\User;
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
      User::create([
          'codi_parc' => 00,
          'name'     => 'admin',
          'password' => bcrypt('123456'),
      ]);
    }
}
