<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Users_TeamOpe_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $now=Carbon::now();
      $now= new Carbon('2020-10-01');
      $user=new User;
      $user::insert([
        ['name'=>'中川泰誠','email'=>'nakagawa@faith-sol-tech.com','password'=>Hash::make('nakagawa123'),'role'=>3,'order_of_row'=>1,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'黒島永幹','email'=>'kuroshima@faith-sol-tech.com','password'=>Hash::make('kuroshima123'),'role'=>3,'order_of_row'=>2,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'﨑山亮','email'=>'r_sakiyama@faith-sol-tech.com','password'=>Hash::make('sakiyama123'),'role'=>3,'order_of_row'=>3,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'齋藤隼','email'=>'j_saito@faith-sol-tech.com','password'=>Hash::make('saito123'),'role'=>17,'order_of_row'=>4,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'澤田晋佑','email'=>'s_sawada@faith-sol-tech.com','password'=>Hash::make('sawada123'),'role'=>17,'order_of_row'=>5,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'古野昌信','email'=>'m_furuno@faith-sol-tech.com','password'=>Hash::make('furuno123'),'role'=>17,'order_of_row'=>6,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'福田拓也','email'=>'t_fukuda@faith-sol-tech.com','password'=>Hash::make('fukuda123'),'role'=>17,'order_of_row'=>7,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'日高諒','email'=>'r_hidaka@faith-sol-tech.com','password'=>Hash::make('hidaka123'),'role'=>17,'order_of_row'=>8,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'塩出素己','email'=>'m_shiode@faith-sol-tech.com','password'=>Hash::make('shiode123'),'role'=>17,'order_of_row'=>9,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'山本秀仁','email'=>'faith.yamamoto@gmail.com','password'=>Hash::make('yamamoto123'),'role'=>17,'order_of_row'=>10,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'井関真美菜','email'=>'iseki.mamina.f@gmail.com','password'=>Hash::make('iseki123'),'role'=>17,'order_of_row'=>11,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'井川慶輝','email'=>'y_ikawa@faith-sol-tech.com','password'=>Hash::make('ikawa123'),'role'=>17,'order_of_row'=>12,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'上松直起','email'=>'faith.uematsu@gmail.com','password'=>Hash::make('uematsu123'),'role'=>17,'order_of_row'=>13,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'在間菜々美','email'=>'nanami.zaima@gmail.com','password'=>Hash::make('zaima123'),'role'=>17,'order_of_row'=>14,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'大野功行','email'=>'ohno.faith@gmail.com','password'=>Hash::make('ohno123'),'role'=>17,'order_of_row'=>15,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'池田基紀','email'=>'ikedamotoki1003@gmail.com','password'=>Hash::make('ikeda123'),'role'=>17,'order_of_row'=>16,'display_shift'=>TRUE,'own_department'=>4,'created_at'=>$now,'updated_at'=>$now,],
        ['name'=>'監視端末','email'=>'noc@noc.faith-sol-tech.com','password'=>Hash::make('kanshi123'),'role'=>17,'order_of_row'=>17,'display_shift'=>FALSE,'own_department'=>null,'created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
