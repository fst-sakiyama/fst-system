<?php

use Illuminate\Database\Seeder;
use App\Models\MasterContractType;
use Carbon\Carbon;

class MasterContractTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $now=Carbon::now();
         $MasterContractType=new MasterContractType;
         $MasterContractType::insert([
           ['contractType'=>'継続','created_at'=>$now,'updated_at'=>$now,],
           ['contractType'=>'入札','created_at'=>$now,'updated_at'=>$now,],
           ['contractType'=>'短期','created_at'=>$now,'updated_at'=>$now,],
           ['contractType'=>'社内','created_at'=>$now,'updated_at'=>$now,],
           ['contractType'=>'開発','created_at'=>$now,'updated_at'=>$now,],
           ['contractType'=>'運用','created_at'=>$now,'updated_at'=>$now,],
         ]);
     }
}
