<?php

use Illuminate\Database\Seeder;
use App\Models\MasterProject;
use Carbon\Carbon;

class MasterProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now=Carbon::now();
      $MasterProject=new MasterProject;
      $MasterProject::insert([
        ['clientId'=>1,'contractTypeId'=>6,'projectName'=>'脆弱性調査','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
