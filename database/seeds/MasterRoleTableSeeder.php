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
          ['role'=>3,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>4,'roleName'=>'管理者','created_at'=>$now,'updated_at'=>$now,],
          ['role'=>5,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>6,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>7,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>8,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>9,'roleName'=>null,'created_at'=>$now,'updated_at'=>$now,],
          ['role'=>10,'roleName'=>'ユーザー','created_at'=>$now,'updated_at'=>$now,],
        ]);
    }
}
