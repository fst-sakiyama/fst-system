<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FstSystemProgressDetail;
use Carbon\Carbon;

class fst_system_progress_details_test_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now=Carbon::now();
      $fstSystemProgressDetail=new FstSystemProgressDetail;
      $fstSystemProgressDetail::insert([
        ['fstSystemprogressId'=>1,'fstSystemPlanDetail'=>'詳細テスト1','doComp'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['fstSystemprogressId'=>1,'fstSystemPlanDetail'=>'詳細テスト2','doComp'=>$now,'created_at'=>$now,'updated_at'=>$now,],
      ]);

    }
}
