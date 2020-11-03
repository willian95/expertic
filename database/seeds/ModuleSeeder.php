<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = DB::table('modules')->count();

        if($modules==0){

            $modules = [
                ['module_name' => 'Biblioteca','module_description'=>'Biblioteca','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['module_name' => 'Certificados','module_description'=>'Certificados','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['module_name' => 'Virtual','module_description'=>'Virtual','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['module_name' => 'Pago','module_description'=>'Pago','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
            ];

            DB::table('modules')->insert($modules);


        }//if($modules==0)
    }
}
