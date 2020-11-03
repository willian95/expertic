<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = DB::table('roles')->count();

        if($roles==0){

            $roles = [
                ['role_name' => 'administrator','role_description'=>'Admin','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['role_name' => 'business_administrator','role_description'=>'Admin de Empresa','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['role_name' => 'teacher','role_description'=>'Profesor','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['role_name' => 'attorney','role_description'=>'Apoderado','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['role_name' => 'student','role_description'=>'Estudiante','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['role_name' => 'administrative','role_description'=>'Administrativo','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
            ];

            DB::table('roles')->insert($roles);


        }//if($roles==0)
    }
}
