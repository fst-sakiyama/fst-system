<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterRole;

class MasterRoleTableUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterRole::where('role','3')->update(['roleName'=>'営業＋経理']);
        MasterRole::where('role','4')->update(['roleName'=>'開発＋経理']);
        MasterRole::where('role','5')->update(['roleName'=>'運用＋経理']);
    }
}
