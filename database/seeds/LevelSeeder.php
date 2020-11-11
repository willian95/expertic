<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = DB::table('levels')->count();

        if($levels==0){

            $levels = [

                ['institution_id' => 1,'level'=>'1er Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'level'=>'2do Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'level'=>'3er Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'level'=>'4to Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id' => 2,'level'=>'1er Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'level'=>'2do Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'level'=>'3er Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'level'=>'4to Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                

                ['institution_id' => 3,'level'=>'1er Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'level'=>'2do Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'level'=>'3er Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'level'=>'4to Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],    

                ['institution_id' => 4,'level'=>'1er Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'level'=>'2do Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'level'=>'3er Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'level'=>'4to Año','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                    
                
            ];

            DB::table('levels')->insert($levels);


        }//if($levels==0)
    }
}
