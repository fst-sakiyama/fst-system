<?php
namespace Database\Seeders;

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
        ['fileClassification'=>'手順書','folderName'=>'team_pj_manual','order_of_row'=>5,'created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'接続情報','folderName'=>'team_pj_connect','order_of_row'=>10,'created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'資料','folderName'=>'team_pj_document','order_of_row'=>15,'created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'作業履歴','folderName'=>'team_pj_history','order_of_row'=>20,'created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'報告書','folderName'=>'team_pj_report','order_of_row'=>25,'created_at'=>$now,'updated_at'=>$now,],
        ['fileClassification'=>'その他','folderName'=>'team_pj_other','order_of_row'=>30,'created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
