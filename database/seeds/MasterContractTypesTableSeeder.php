<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterContractType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MasterContractTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        MasterContractType::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('master_contract_types')->truncate();

        $now=Carbon::now();
        $MasterContractType=new MasterContractType;
        $MasterContractType::insert([
          ['contractType'=>'継続','contractTypeImage'=>'continue.png','created_at'=>$now,'updated_at'=>$now,],
          ['contractType'=>'入札','contractTypeImage'=>'bid.png','created_at'=>$now,'updated_at'=>$now,],
          ['contractType'=>'短期','contractTypeImage'=>'short.png','created_at'=>$now,'updated_at'=>$now,],
          ['contractType'=>'その他','contractTypeImage'=>'contractType_other.png','created_at'=>$now,'updated_at'=>$now,],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        MasterContractType::reguard();
      }
}
