<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $institutions = DB::table('institutions')->count();

        if($institutions==0){
            
            $institutions = [

                ['rut' => '82411500', 'institution_name' => 'CASA DE TALLERES DE SAN VICENTE DE PAUL','reason_social' => 'COLEGIO SAN VICENTE DE PAUL','address' => 'Toesca 3090,  santiago metropolitana de santiago','website_link'=>'https://es-la.facebook.com/eitsvp/','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['rut' => '77832400', 'institution_name' => 'SOC. EDUC. NORMA LUHR FERNANDEZ E HIJOS LTDA','reason_social' => 'ESCUELA PARTICULAR DIEGO DE ALMAGRO','address' => 'Los Presidentes 6922,  penalolen metropolitana de santiago','website_link'=>'https://es-la.facebook.com/Centro-Educacional-Diego-de-Almagro-356212181215069/','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['rut' => '76176470', 'institution_name' => 'SOC. EDUC. PADRE ALBERTO HURTADO Y CIA. LTDA.','reason_social' => 'ESC.ESP.DE TRAST.ESPEC.DEL LENGUAJE PADRE ALBERTO HURTADO Y CIA','address' => 'Porto Seguro 4281,  quinta normal metropolitana de santiago','website_link'=>'https://www.esc-esp-trast.espec.com','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['rut' => '76165353', 'institution_name' => 'SOCIEDAD DE EDUCACION BALDOMERO LILLO LIMITADA','reason_social' => 'COLEGIO BALDOMERO LILLO','address' => 'Americo Vespucio 555,  la cisterna metropolitana de santiago','website_link'=>'https://www.colegio-baldomero-lillo.com','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

            ];

            DB::table('institutions')->insert($institutions);

            $institution_module = [

                ['institution_id'=>1,'module_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id'=>1,'module_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id'=>1,'module_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id'=>1,'module_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id'=>2,'module_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id'=>2,'module_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id'=>3,'module_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id'=>3,'module_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id'=>4,'module_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id'=>4,'module_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
               
            ];

            DB::table('institution_module')->insert($institution_module);

            $users = [

                ['name' => 'Usuario 2', 'lastname' => 'Admin de Empresa','email' => 'businessadmin1@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Admin de Empresa','email' => 'businessadmin2@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Admin de Empresa','email' => 'businessadmin3@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['name' => 'Usuario 2', 'lastname' => 'Admin de Empresa','email' => 'businessadmin4@gmail.com','password' => Hash::make('12345678'),'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

            ];

            DB::table('users')->insert($users);

            $user_roles = [

                ['user_id'=>2,'role_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>3,'role_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>4,'role_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>5,'role_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

            ];

            DB::table('user_roles')->insert($user_roles);

            $institution_user = [

                ['user_id'=>2,'institution_id'=>1,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>3,'institution_id'=>2,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>4,'institution_id'=>3,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['user_id'=>5,'institution_id'=>4,'created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
            ];

            DB::table('institution_user')->insert($institution_user);

        }//if($users==0)
    }
}
