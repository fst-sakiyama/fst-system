<?php

// use Illuminate\Database\Seeder;
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
        $this->call(MasterRoleTableSeeder::class);
        $this->call(MasterWorkingTeamSeeder::class);
        $this->call(users_init_seeder::class);
        $this->call(Users_TeamOpe_Seeder::class);
        $this->call(MasterShiftsTableSeeder::class);
        $this->call(MasterClientsTableSeeder::class);
        $this->call(MasterContractTypesTableSeeder::class);
        $this->call(MasterFileClassificationsTableSeeder::class);
        $this->call(MasterProjectsTableSeeder::class);

    }
}
