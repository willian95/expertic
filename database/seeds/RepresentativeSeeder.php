<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RepresentativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $representatives = DB::table('representatives')->count();

        if($representatives==0){

            //Crear Usuarios para Usuarios Apoderados

            $users = [

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado1@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado2@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado3@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado4@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado5@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado6@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado7@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado8@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

 
                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado9@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado10@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado11@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado12@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],     
                
                
                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado13@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado14@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado15@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 4', 'lastname' => 'Apoderado','email' => 'apoderado16@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],            

            ];

            DB::table('users')->insert($users);

            //Asignar roles a usuarios apoderados

            $user_roles = [

                ['user_id'=>22,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>23,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>24,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>25,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>26,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>27,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>28,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>29,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
 
                 
                ['user_id'=>30,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>31,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>32,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>33,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>34,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>35,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>36,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>37,'role_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                

            ];

            DB::table('user_roles')->insert($user_roles);

            //Asiganar Usuario a Institución
            $institution_user = [

                ['user_id'=>22,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>23,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>24,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>25,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>26,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>27,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>28,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>29,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()], 
                
                
                ['user_id'=>30,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>31,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>32,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>33,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>34,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>35,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>36,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>37,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                 
                
            ];

            DB::table('institution_user')->insert($institution_user);            

            //Crear Usuario apoderado

            $representatives = [

                ['user_id'=>22,'institution_id' => 1,'rut'=>'345667','representative_name'=>'Maria','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>23,'institution_id' => 1,'rut'=>'344224','representative_name'=>'Juan','representative_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>24,'institution_id' => 1,'rut'=>'676565','representative_name'=>'Freddys','representative_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>25,'institution_id' => 1,'rut'=>'234334','representative_name'=>'Eduard','representative_lastname'=>'Lugo','address'=>'La cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>26,'institution_id' => 2,'rut'=>'676756','representative_name'=>'Maria','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>27,'institution_id' => 2,'rut'=>'454534','representative_name'=>'Juan','representative_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>28,'institution_id' => 2,'rut'=>'454545','representative_name'=>'Andrea','representative_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>29,'institution_id' => 2,'rut'=>'676455','representative_name'=>'Pedro','representative_lastname'=>'Lugo','address'=>'La cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                
                ['user_id'=>30,'institution_id' => 3,'rut'=>'343434','representative_name'=>'Maria','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>31,'institution_id' => 3,'rut'=>'454566','representative_name'=>'Juan','representative_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>32,'institution_id' => 3,'rut'=>'787453','representative_name'=>'Andrea','representative_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>33,'institution_id' => 3,'rut'=>'234679','representative_name'=>'Pedro','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>34,'institution_id' => 4,'rut'=>'345345','representative_name'=>'Maria','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>35,'institution_id' => 4,'rut'=>'345532','representative_name'=>'Juan','representative_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>36,'institution_id' => 4,'rut'=>'345554','representative_name'=>'Andrea','representative_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>37,'institution_id' => 4,'rut'=>'234234','representative_name'=>'Pedro','representative_lastname'=>'Lugo','address'=>'La cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                
                
            ];

            DB::table('representatives')->insert($representatives);            

            //Crear Usuario para apoderados Visor
            $users = [

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor1@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor2@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor3@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor4@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor5@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor6@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor7@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor8@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

 
                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor9@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor10@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor11@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor12@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],     
                
                
                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor13@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor14@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor15@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 5', 'lastname' => 'Apoderado Visor','email' => 'apoderado_visor16@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],            

            ];

            DB::table('users')->insert($users);

            //Asignar Usuario para apoderados Visor al rol
            $user_roles = [

                ['user_id'=>38,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>39,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>40,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>41,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>42,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>43,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>44,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>45,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
 
                 
                ['user_id'=>46,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>47,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>48,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>49,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>50,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>51,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>52,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>53,'role_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                

            ];

            DB::table('user_roles')->insert($user_roles);
            
            //Asignar Usuario para apoderados Visor a la institución
            $institution_user = [

                ['user_id'=>38,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>39,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>40,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>41,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>42,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>43,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>44,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>45,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()], 
                
                
                ['user_id'=>46,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>47,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>48,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>49,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>50,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>51,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>52,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>53,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                 
                
            ];

            DB::table('institution_user')->insert($institution_user);    

            //Crear apoderados Visor 
            $representatives = [

                ['user_id'=>38,'institution_id' => 1,'representative_id'=>1,'rut'=>'343345','representative_name'=>'Ricardo','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>39,'institution_id' => 1,'representative_id'=>2,'rut'=>'654433','representative_name'=>'Carla','representative_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>40,'institution_id' => 1,'representative_id'=>3,'rut'=>'976433','representative_name'=>'Lorena','representative_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>41,'institution_id' => 1,'representative_id'=>4,'rut'=>'243567','representative_name'=>'Karelys','representative_lastname'=>'Lugo','address'=>'La cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>42,'institution_id' => 2,'representative_id'=>5,'rut'=>'343267','representative_name'=>'Ricardo','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>43,'institution_id' => 2,'representative_id'=>6,'rut'=>'842556','representative_name'=>'Carla','representative_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>44,'institution_id' => 2,'representative_id'=>7,'rut'=>'355468','representative_name'=>'Lorena','representative_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>45,'institution_id' => 2,'representative_id'=>8,'rut'=>'233465','representative_name'=>'Karelys','representative_lastname'=>'Lugo','address'=>'La cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                
                ['user_id'=>46,'institution_id' => 3,'representative_id'=>9,'rut'=>'927547','representative_name'=>'Ricardo','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>47,'institution_id' => 3,'representative_id'=>10,'rut'=>'345678','representative_name'=>'Carla','representative_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>48,'institution_id' => 3,'representative_id'=>11,'rut'=>'078332','representative_name'=>'Karelys','representative_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>49,'institution_id' => 3,'representative_id'=>12,'rut'=>'123124','representative_name'=>'Lorena','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>50,'institution_id' => 4,'representative_id'=>13,'rut'=>'893545','representative_name'=>'Ricardo','representative_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>51,'institution_id' => 4,'representative_id'=>14,'rut'=>'8794354','representative_name'=>'Carla','representative_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>52,'institution_id' => 4,'representative_id'=>15,'rut'=>'5468335','representative_name'=>'Karelys','representative_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>53,'institution_id' => 4,'representative_id'=>16,'rut'=>'3423454','representative_name'=>'Lorena','representative_lastname'=>'Lugo','address'=>'La cisterna metropolitana de santiago','phone'=>'56123456789','leading'=>0,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                
                
            ]; 

            DB::table('representatives')->insert($representatives);            
            
            //Crear Usuario para Estudiantes
            $users = [

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante1@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante2@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante3@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante4@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante5@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante6@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante7@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante8@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

 
                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante9@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante10@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante11@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante12@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],     
                
                
                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante13@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante14@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante15@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 6', 'lastname' => 'Estudiante','email' => 'estudiante16@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],            

            ];

            DB::table('users')->insert($users);

            //Asignar Usuario para estudianter al rol
            $user_roles = [

                ['user_id'=>54,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>55,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>56,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>57,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>58,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>59,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>60,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>61,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
 
                 
                ['user_id'=>62,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>63,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>64,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>65,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>66,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>67,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>68,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>69,'role_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                

            ];

            DB::table('user_roles')->insert($user_roles);
            
            //Asignar Usuario estudiante a la institución
            $institution_user = [

                ['user_id'=>54,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>55,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>56,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>57,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>58,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>59,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>60,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>61,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()], 
                
                
                ['user_id'=>62,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>63,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>64,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>65,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>66,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>67,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>68,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>69,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                 
                
            ];

            DB::table('institution_user')->insert($institution_user);    

            //Crear Estudiante
            $students = [

                ['user_id'=>54,'institution_id' => 1,'representative_id'=>1,'rut'=>'445622','student_name'=>'Luis','student_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','allergies'=>'Olores Fuertes','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>55,'institution_id' => 1,'representative_id'=>2,'rut'=>'223456','student_name'=>'Hector','student_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','allergies'=>'Al mani','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>56,'institution_id' => 1,'representative_id'=>3,'rut'=>'234456','student_name'=>'Leonel','student_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','allergies'=>'Penicilina','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>57,'institution_id' => 1,'representative_id'=>4,'rut'=>'234324','student_name'=>'Gilberto','student_lastname'=>'Lugo','address'=>'La cisterna metropolitana de santiago','phone'=>'56123456789','allergies'=>'Antibioticos','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],


                ['user_id'=>58,'institution_id' => 2,'representative_id'=>5,'rut'=>'3454525','student_name'=>'Luis','student_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','allergies'=>'Al mani','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>59,'institution_id' => 2,'representative_id'=>6,'rut'=>'9678547','student_name'=>'Hector','student_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','allergies'=>'Penicilina','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>60,'institution_id' => 2,'representative_id'=>7,'rut'=>'3454350','student_name'=>'Leonel','student_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','allergies'=>'Antibioticos','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>61,'institution_id' => 2,'representative_id'=>8,'rut'=>'3454563','student_name'=>'Gilberto','student_lastname'=>'Lugo','address'=>'La cisterna metropolitana de santiago','phone'=>'56123456789','allergies'=>'Olores Fuertes','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                
                ['user_id'=>62,'institution_id' => 3,'representative_id'=>9,'rut'=>'3243244','student_name'=>'Luis','student_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','allergies'=>'Dermatitis','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>63,'institution_id' => 3,'representative_id'=>10,'rut'=>'675765','student_name'=>'Hector','student_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','allergies'=>'Penicilina','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>64,'institution_id' => 3,'representative_id'=>11,'rut'=>'567465','student_name'=>'Leonel','student_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','allergies'=>'Olores Fuertes','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>65,'institution_id' => 3,'representative_id'=>12,'rut'=>'345435','student_name'=>'Gilberto','student_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','allergies'=>'Dermatitis','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['user_id'=>66,'institution_id' => 4,'representative_id'=>13,'rut'=>'3454388','student_name'=>'Luis','student_lastname'=>'Lugo','address'=>'Avenida Arturo Prat N° 2120, Ciudad de Iquique','phone'=>'56123456789','allergies'=>'Olores Fuertes','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>67,'institution_id' => 4,'representative_id'=>14,'rut'=>'5654633','student_name'=>'Hector','student_lastname'=>'Yedra','address'=>'Americo Vespucio 555,  la cisterna metropolitana de santiago','phone'=>'56123456789','allergies'=>'Al mani','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>68,'institution_id' => 4,'representative_id'=>15,'rut'=>'3453467','student_name'=>'Leonel','student_lastname'=>'Arias','address'=>'Calle Nueva 1781,  nunoa metropolitana de santiago','phone'=>'56123456789','allergies'=>'Penicilina','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['user_id'=>69,'institution_id' => 4,'representative_id'=>16,'rut'=>'3453422','student_name'=>'Gilberto','student_lastname'=>'Lugo','address'=>'La cisterna metropolitana de santiago','phone'=>'56123456789','allergies'=>'Dermatitis','blood_type'=>'O+','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                
                
            ]; 

            DB::table('students')->insert($students);  

            //Asignar Usuario estudiante al representante
            $representative_student = [

                ['representative_id'=>1,'student_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>2,'student_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>3,'student_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>4,'student_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['representative_id'=>5,'student_id'=>5,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>6,'student_id'=>6,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>7,'student_id'=>7,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>8,'student_id'=>8,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()], 
                
                
                ['representative_id'=>9,'student_id'=>9,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>10,'student_id'=>10,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>11,'student_id'=>11,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>12,'student_id'=>12,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                
                ['representative_id'=>13,'student_id'=>13,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>14,'student_id'=>14,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>15,'student_id'=>15,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['representative_id'=>16,'student_id'=>16,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],                 
                
            ];

            DB::table('representative_student')->insert($representative_student);   


        }//if($representatives==0)
    
    }
}
