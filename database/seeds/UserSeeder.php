<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->count();

        if($users==0){
            
            $users = [
                ['name' => 'Usuario 1', 'lastname' => 'Admin','email' => 'admin@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['name' => 'Usuario 2', 'lastname' => 'Admin de Empresa','email' => 'businessadmin@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
            ];

            DB::table('users')->insert($users);

            $user_roles = [
                ['user_id'=>1,'role_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['user_id'=>2,'role_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
            ];

            DB::table('user_roles')->insert($user_roles);


        }//if($users==0)
    }
}
