<?php

use Illuminate\Database\Seeder;
use App\Models\MasterRole;
use Carbon\Carbon;

class MasterRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon::now();
        $MasterRole=new MasterRole;
        $MasterRole::insert([
          ['role'=>1,'roleName'=>'開発者','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>2,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>3,'roleName'=>'管理者','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>4,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>5,'roleName'=>'営業＋経理','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>6,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>7,'roleName'=>'開発＋経理','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>8,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>9,'roleName'=>'運用＋経理','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>10,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>11,'roleName'=>'経理チーム','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>12,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>13,'roleName'=>'営業チーム','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>14,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>15,'roleName'=>'開発チーム','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>16,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>17,'roleName'=>'運用チーム','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>18,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>19,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>20,'roleName'=>'ユーザー','created_at'=>$now,'updated_at'=>$now,]
        ]);
    }
}
