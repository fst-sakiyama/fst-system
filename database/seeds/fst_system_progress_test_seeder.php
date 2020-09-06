<?php

use Illuminate\Database\Seeder;
use App\Models\FstSystemProgress;
use Carbon\Carbon;

class fst_system_progress_test_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon::now();
        $fstSystemProgress=new FstSystemProgress;
        $fstSystemProgress::insert([
          ['fstSystemPlan'=>'テスト','created_at'=>$now,'updated_at'=>$now,]
        ]);
    }
}
