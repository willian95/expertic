<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = DB::table('teachers')->count();

        if($teachers==0){

            $users = [

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor1@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor2@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor3@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor4@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor5@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor6@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor7@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor8@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

 
                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor9@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor10@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor11@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor12@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],     
                
                
                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor13@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor14@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor15@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Profesor','email' => 'profesor16@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],            

            ];

            DB::table('users')->insert($users);


            $user_roles = [

                ['user_id'=>6,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>7,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>8,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>9,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>10,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>11,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>12,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>13,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
 
                 
                ['user_id'=>14,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>15,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>16,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>17,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>18,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>19,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>20,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>21,'role_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                

            ];

            DB::table('user_roles')->insert($user_roles);


            $institution_user = [

                ['user_id'=>6,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>7,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>8,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>9,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>10,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>11,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>12,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>13,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()], 
                
                
                ['user_id'=>14,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>15,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>16,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>17,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>18,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>19,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>20,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>21,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                 
                
            ];

            DB::table('institution_user')->insert($institution_user);            


            $teachers = [

                ['user_id'=>6,'institution_id' => 1,'rut'=>'123456','teacher_name'=>'Monica','teacher_lastname'=>'Saavedra','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>7,'institution_id' => 1,'rut'=>'654321','teacher_name'=>'Carlos','teacher_lastname'=>'Falcon','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>8,'institution_id' => 1,'rut'=>'4174173','teacher_name'=>'Andrea','teacher_lastname'=>'Chirinos','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>9,'institution_id' => 1,'rut'=>'356778','teacher_name'=>'Pedro','teacher_lastname'=>'Lugo','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>10,'institution_id' => 2,'rut'=>'985342','teacher_name'=>'Monica','teacher_lastname'=>'Saavedra','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>11,'institution_id' => 2,'rut'=>'329873','teacher_name'=>'Carlos','teacher_lastname'=>'Falcon','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>12,'institution_id' => 2,'rut'=>'098765','teacher_name'=>'Andrea','teacher_lastname'=>'Chirinos','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>13,'institution_id' => 2,'rut'=>'752468','teacher_name'=>'Pedro','teacher_lastname'=>'Lugo','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                
                ['user_id'=>14,'institution_id' => 3,'rut'=>'359742','teacher_name'=>'Monica','teacher_lastname'=>'Saavedra','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>15,'institution_id' => 3,'rut'=>'125874','teacher_name'=>'Carlos','teacher_lastname'=>'Falcon','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>16,'institution_id' => 3,'rut'=>'003258','teacher_name'=>'Andrea','teacher_lastname'=>'Chirinos','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>17,'institution_id' => 3,'rut'=>'985472','teacher_name'=>'Pedro','teacher_lastname'=>'Lugo','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>18,'institution_id' => 4,'rut'=>'456546','teacher_name'=>'Monica','teacher_lastname'=>'Saavedra','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>19,'institution_id' => 4,'rut'=>'455432','teacher_name'=>'Carlos','teacher_lastname'=>'Falcon','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>20,'institution_id' => 4,'rut'=>'576721','teacher_name'=>'Andrea','teacher_lastname'=>'Chirinos','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>21,'institution_id' => 4,'rut'=>'652445','teacher_name'=>'Pedro','teacher_lastname'=>'Lugo','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                
                
            ];

            DB::table('teachers')->insert($teachers);


            $subject_teacher = [

                ['teacher_id'=>1,'subject_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>1,'subject_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>1,'subject_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>1,'subject_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['teacher_id'=>2,'subject_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>2,'subject_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>2,'subject_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>2,'subject_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                

                ['teacher_id'=>3,'subject_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>3,'subject_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>3,'subject_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>3,'subject_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['teacher_id'=>4,'subject_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>4,'subject_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>4,'subject_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['teacher_id'=>4,'subject_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

            ];     

            DB::table('subject_teacher')->insert($subject_teacher);
                
        }//if($teachers==0)
    }
}
