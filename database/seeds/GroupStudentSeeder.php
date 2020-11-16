<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GroupStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $groups_students = DB::table('groups_students')->count();

        if($groups_students==0){

            $groups_students = [


                ['institution_id' => 1,'period_id'=>4,'level_id'=>1,'section_id'=>1,'student_id'=>1,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'period_id'=>4,'level_id'=>1,'section_id'=>1,'student_id'=>2,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'period_id'=>4,'level_id'=>2,'section_id'=>2,'student_id'=>3,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'period_id'=>4,'level_id'=>2,'section_id'=>2,'student_id'=>4,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id' => 2,'period_id'=>4,'level_id'=>1,'section_id'=>1,'student_id'=>1,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'period_id'=>4,'level_id'=>1,'section_id'=>1,'student_id'=>2,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'period_id'=>4,'level_id'=>2,'section_id'=>2,'student_id'=>3,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'period_id'=>4,'level_id'=>2,'section_id'=>2,'student_id'=>4,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
           
                ['institution_id' => 3,'period_id'=>4,'level_id'=>1,'section_id'=>1,'student_id'=>1,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'period_id'=>4,'level_id'=>1,'section_id'=>1,'student_id'=>2,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'period_id'=>4,'level_id'=>2,'section_id'=>2,'student_id'=>3,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'period_id'=>4,'level_id'=>2,'section_id'=>2,'student_id'=>4,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
 
                ['institution_id' => 4,'period_id'=>4,'level_id'=>1,'section_id'=>1,'student_id'=>1,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'period_id'=>4,'level_id'=>1,'section_id'=>1,'student_id'=>2,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'period_id'=>4,'level_id'=>2,'section_id'=>2,'student_id'=>3,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'period_id'=>4,'level_id'=>2,'section_id'=>2,'student_id'=>4,'active'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                
                
            ];

            DB::table('groups_students')->insert($groups_students);


        }//if($groups_students==0)        

    }
}


            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('student_id');
            $table->boolean('active')->default(1);