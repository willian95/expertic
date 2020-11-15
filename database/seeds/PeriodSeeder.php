<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periods = DB::table('periods')->count();

        if($periods==0){

            $periods = [

                ['institution_id' => 1,'start_date_period'=>'2017-03-05','end_date_period'=>'2017-12-06','period'=>'2017','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'start_date_period'=>'2018-03-05','end_date_period'=>'2018-12-13','period'=>'2018','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'start_date_period'=>'2019-03-05','end_date_period'=>'2019-12-20','period'=>'2019','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 1,'start_date_period'=>'2020-03-05','end_date_period'=>'2020-12-09','period'=>'2020','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],

                ['institution_id' => 2,'start_date_period'=>'2017-03-05','end_date_period'=>'2017-12-06','period'=>'2017','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'start_date_period'=>'2018-03-05','end_date_period'=>'2018-12-13','period'=>'2018','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'start_date_period'=>'2019-03-05','end_date_period'=>'2019-12-20','period'=>'2019','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 2,'start_date_period'=>'2020-03-05','end_date_period'=>'2020-12-09','period'=>'2020','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['institution_id' => 3,'start_date_period'=>'2017-03-05','end_date_period'=>'2017-12-06','period'=>'2017','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'start_date_period'=>'2018-03-05','end_date_period'=>'2018-12-13','period'=>'2018','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'start_date_period'=>'2019-03-05','end_date_period'=>'2019-12-20','period'=>'2019','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 3,'start_date_period'=>'2020-03-05','end_date_period'=>'2020-12-09','period'=>'2020','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                
                ['institution_id' => 4,'start_date_period'=>'2017-03-05','end_date_period'=>'2017-12-06','period'=>'2017','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'start_date_period'=>'2018-03-05','end_date_period'=>'2018-12-13','period'=>'2018','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'start_date_period'=>'2019-03-05','end_date_period'=>'2019-12-20','period'=>'2019','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],
                ['institution_id' => 4,'start_date_period'=>'2020-03-05','end_date_period'=>'2020-12-09','period'=>'2020','created_at' => Carbon::now(),'updated_at'=> Carbon::now()],               

            ];

            DB::table('periods')->insert($periods);


        }//if($periods==0)
    }
}
