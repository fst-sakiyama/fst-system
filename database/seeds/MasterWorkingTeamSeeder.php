<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterWorkingTeam;
use Carbon\Carbon;

class MasterWorkingTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now=Carbon::now();
      $MasterWorkingTeam=new MasterWorkingTeam;
      $MasterWorkingTeam::insert([
        ['workingTeam'=>'社内','workingTeamImage'=>'inHouse.png','created_at'=>$now,'updated_at'=>$now,],
        ['workingTeam'=>'営業','workingTeamImage'=>'sales.png','created_at'=>$now,'updated_at'=>$now,],
        ['workingTeam'=>'開発','workingTeamImage'=>'dev.png','created_at'=>$now,'updated_at'=>$now,],
        ['workingTeam'=>'運用','workingTeamImage'=>'ope.png','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
