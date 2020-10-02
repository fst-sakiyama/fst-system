<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShiftTable;
use Carbon\Carbon;

class ShiftTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now=Carbon::now();
      $MasterShift=new ShiftTable;
      $MasterShift::insert([
        ['workDay'=>'2020-09-01','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-02','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-03','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-04','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-05','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-06','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-07','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-08','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-09','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-10','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-11','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-12','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-13','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-14','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-15','userId'=>'1','shiftId'=>'4','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-16','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-17','userId'=>'1','shiftId'=>'4','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-18','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-19','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-20','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-21','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-22','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-23','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-24','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-25','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-26','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-27','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-28','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-29','userId'=>'1','shiftId'=>'7','created_at'=>$now,'updated_at'=>$now,],
        ['workDay'=>'2020-09-30','userId'=>'1','shiftId'=>'2','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
