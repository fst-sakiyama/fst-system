<?php

use Illuminate\Database\Seeder;
use App\Models\MasterRequestClassification;
use Carbon\Carbon;

class MasterRequestClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now=Carbon::now();
      $MasterRequestClassification=new MasterRequestClassification;
      $MasterRequestClassification::insert([
        ['requestClassification'=>'機能追加','created_at'=>$now,'updated_at'=>$now,],
        ['requestClassification'=>'機能修正','created_at'=>$now,'updated_at'=>$now,],
        ['requestClassification'=>'バグ報告','created_at'=>$now,'updated_at'=>$now,],
        ['requestClassification'=>'そのほか','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
