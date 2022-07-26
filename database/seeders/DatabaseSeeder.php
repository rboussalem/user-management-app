<?php

namespace Database\Seeders;

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
        if($this->command->confirm("Do you want to refresh the database ?")){
            $this->command->call("migrate:refresh");
            $this->command->info("database was refreshed !");
        }
        $nbrUsers = (int)$this->command->ask("how many of user you wand generate ?", 30);

        \App\Models\User::factory($nbrUsers)->create();

    }
}
