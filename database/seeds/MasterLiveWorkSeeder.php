<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterLiveWork;
use Carbon\Carbon;

class MasterLiveWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $masterLiveWork = new MasterLiveWork;
        $masterLiveWork::insert([
            ['liveWork'=>'テスト配信開始時刻','created_at'=>$now,'updated_at'=>$now,],
            ['liveWork'=>'エンコーダリフレッシュ時刻','created_at'=>$now,'updated_at'=>$now,],
            ['liveWork'=>'本番開始時刻','created_at'=>$now,'updated_at'=>$now,],
            ['liveWork'=>'本番終了時刻','created_at'=>$now,'updated_at'=>$now,],
            ['liveWork'=>'エンコーダ停止確認時刻','created_at'=>$now,'updated_at'=>$now,],
        ]);
    }
}
