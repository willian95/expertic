<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = DB::table('sections')->count();

        if($sections==0){

            $sections = [

                ['institution_id' => 1,'section'=>'A','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'section'=>'B','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'section'=>'C','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'section'=>'D','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id' => 2,'section'=>'A','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'section'=>'B','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'section'=>'C','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'section'=>'D','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                

                ['institution_id' => 3,'section'=>'A','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'section'=>'B','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'section'=>'C','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'section'=>'D','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],    

                ['institution_id' => 4,'section'=>'A','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'section'=>'B','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'section'=>'C','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'section'=>'D','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                    
                
            ];

            DB::table('sections')->insert($sections);

        }//if($sections==0)
    }
}
