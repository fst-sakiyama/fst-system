<?php

use Illuminate\Database\Seeder;
use App\Models\MasterFileClassification;
use Carbon\Carbon;

class MasterFileClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now=Carbon::now();
      $MasterFileClassification=new MasterFileClassification;
      $MasterFileClassification::insert([
        ['fileClassification'=>'手順書','folderName'=>'manual','created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'仕様書','folderName'=>'specification','created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'見積書','folderName'=>'estimates','created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'注文書','folderName'=>'purchase','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
