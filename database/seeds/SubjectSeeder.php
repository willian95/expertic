<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = DB::table('subjects')->count();

        if($subjects==0){

            $subjects = [

                ['institution_id' => 1,'subject'=>'Lengua y Comunicación','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'subject'=>'Matemáticas','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'subject'=>'Historia','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'subject'=>'Inglés','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id' => 2,'subject'=>'Biología','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'subject'=>'Matemáticas','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'subject'=>'Inglés','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'subject'=>'Química','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                

                ['institution_id' => 3,'subject'=>'Inglés','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'subject'=>'Geografía','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'subject'=>'Matemáticas','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'subject'=>'Historia','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],    

                ['institution_id' => 4,'subject'=>'Física','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'subject'=>'Química','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'subject'=>'Biología','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'subject'=>'Matemáticas','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                    
                
            ];

            DB::table('subjects')->insert($subjects);

        }//if($subjects==0)
    }
}
