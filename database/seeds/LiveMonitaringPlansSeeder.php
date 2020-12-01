<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LiveMonitaringPlan;
use Carbon\Carbon;

class LiveMonitaringPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon::now();
        $items=new LiveMonitaringPlan;
        $items::insert([
            ['dvr'=>0,'issueNo'=>1882,'eventDay'=>'2020-12-01','startHour'=>19,'startMinute'=>0,'endHour'=>21,'endMinute'=>0,'liveName'=>'VRMODE','specialNote'=>'・視聴確認依頼が無かった場合は、開始予定時刻の30分前より、視聴確認の開始をお願いさせて頂きます。・視聴確認ページ（1,2ページ目両方）にて、上段真ん中の「HLS ServerSideFailover」が映らない可能性がありますが、その場合は問題無いとのことです。','created_at'=>$now,'updated_at'=>$now,],
            ['dvr'=>1,'issueNo'=>1885,'eventDay'=>'2020-12-01','startHour'=>18,'startMinute'=>0,'endHour'=>19,'endMinute'=>15,'liveName'=>'大日本住友','specialNote'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ]);
    }
}
