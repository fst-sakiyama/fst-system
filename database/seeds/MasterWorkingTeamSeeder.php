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
      $MasterContractType=new MasterWorkingTeam;
      $MasterContractType::insert([
        ['workingTeam'=>'社内','created_at'=>$now,'updated_at'=>$now,],
        ['workingTeam'=>'開発','created_at'=>$now,'updated_at'=>$now,],
        ['workingTeam'=>'運用','created_at'=>$now,'updated_at'=>$now,],
        ['workingTeam'=>'開発＋運用','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
