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
        $this->call(MasterClientsTableSeeder::class);
        $this->call(MasterContractTypesTableSeeder::class);
        $this->call(MasterProjectsTableSeeder::class);
        $this->call(MasterFileClassificationsTableSeeder::class);
        $this->call(MasterRequestClassificationsTableSeeder::class);
        $this->call(MasterRoleTableSeeder::class);
        $this->call(MasterRoleTableUpdateSeeder::class);
        $this->call(MasterShiftsTableSeeder::class);
        $this->call(ShiftTablesSeeder::class);

    }
}
