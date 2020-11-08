<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectsFileClassification;
use Carbon\Carbon;

class ProjectsFileClassificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now=Carbon::now();
      $projectsFileClassification=new ProjectsFileClassification;
      $projectsFileClassification::insert([
        ['fileClassification'=>'仕様書','folderName'=>'pj_specification','order_of_row'=>5,'created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'見積書','folderName'=>'pj_estimates','order_of_row'=>10,'created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'注文書','folderName'=>'pj_order','order_of_row'=>15,'created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'資料','folderName'=>'pj_document','order_of_row'=>20,'created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'その他','folderName'=>'pj_other','order_of_row'=>25,'created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
