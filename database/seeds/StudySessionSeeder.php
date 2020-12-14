<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudySession;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StudySessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_sessions')->truncate();

        $now=Carbon::now();
        $studySession=new StudySession;
        $studySession::insert([
          ['firstName'=>'原','lastName'=>'辰徳','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'戸郷','lastName'=>'翔征','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'大竹','lastName'=>'寛','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'菅野','lastName'=>'智之','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'田中','lastName'=>'豊樹','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'岩隈','lastName'=>'久志','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'野上','lastName'=>'亮磨','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'高橋','lastName'=>'優貴','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'小林','lastName'=>'誠司','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'大城','lastName'=>'卓三','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'炭谷','lastName'=>'銀仁朗','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'増田','lastName'=>'大輝','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'坂本','lastName'=>'勇人','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'岡本','lastName'=>'和真','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'若林','lastName'=>'晃弘','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'丸','lastName'=>'佳浩','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'亀井','lastName'=>'善行','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'石川','lastName'=>'慎吾','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'立岡','lastName'=>'宗一郎','created_at'=>$now,'updated_at'=>$now,],
          ['firstName'=>'重信','lastName'=>'慎之介','created_at'=>$now,'updated_at'=>$now,],
        ]);
    }
}
