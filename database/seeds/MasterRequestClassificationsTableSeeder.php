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
        ['requestClassification'=>'機能追加','requestColorClass'=>'border-primary','explanation'=>'こんな機能を追加して欲しい。','requestImage'=>'add.png','created_at'=>$now,'updated_at'=>$now,],
        ['requestClassification'=>'機能修正','requestColorClass'=>'border-warning','explanation'=>'この機能を修正して欲しい。','requestImage'=>'collect.png','created_at'=>$now,'updated_at'=>$now,],
        ['requestClassification'=>'バグ報告','requestColorClass'=>'border-danger','explanation'=>'バグを見つけました。','requestImage'=>'bug.png','created_at'=>$now,'updated_at'=>$now,],
        ['requestClassification'=>'そのほか','requestColorClass'=>'border-dark','explanation'=>'そのほか、ご意見、ご感想など。','requestImage'=>'other.png','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
