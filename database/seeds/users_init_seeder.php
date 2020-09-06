<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class users_init_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon::now();
        $user=new User;
        $user::insert([
          ['name'=>'﨑山亮','email'=>'r_sakiyama@faith-sol-tech.com','password'=>Hash::make('sakiyama123'),'role'=>1,'created_at'=>$now,'updated_at'=>$now,],
        ]);
    }
}
