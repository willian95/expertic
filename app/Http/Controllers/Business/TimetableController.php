<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTimeTablePost;
use App\Http\Requests\DestroyTimeTablePost;
use App\Models\Period;
use App\Models\Level;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Timetable;
use App\Models\TimetableDetail;

use Carbon\Carbon;

class TimetableController extends Controller
{
  public function __construct() {

    $this->middleware('auth');

  }

  public function list() {
    
    return view('business.timetable.list');

  }// public function index()

  public function create() {

    $Period=Period::where('institution_id',getIdInstitution())->orderBy('id','desc')->get();

    $Level=Level::where('institution_id',getIdInstitution())->orderBy('level','asc')->get();

    $Section=Section::where('institution_id',getIdInstitution())->orderBy('section','asc')->get();

    $Teacher=Teacher::where('institution_id',getIdInstitution())->orderBy('teacher_name','asc')->get();

    $Subject=Subject::where('institution_id',getIdInstitution())->orderBy('subject','asc')->get();

    return view('business.timetable.create')->with(['Period'=>json_encode($Period),'Level'=>json_encode($Level),'Section'=>json_encode($Section),'Teacher'=>json_encode($Teacher),'Subjects'=>json_encode($Subject)]);

  }//public function index()

  public function getMattersTimetable(Request $request){

        try{

          $subjects=array();

          $Teacher=Teacher::query()->where('institution_id',getIdInstitution())->where('id',$request->id)->orderBy('teacher_name','ASC');

          $Teacher= $Teacher->with([

                'subjects' => function($query){ },
            
          ])->get();

          foreach($Teacher as $teac)
          {
              $subjects=array();

              if(count($teac->subjects)>0){

                  foreach($teac->subjects as $subject){

                      $subjects[]= [
            
                          'id'          =>   $subject->id,

                          'name'        =>   $subject->subject,

                          'teacher_id'  =>   $teac->id,

                          'bg'          =>   false,
                      ];
            
                  }//foreach($teac->subjects as $module)

              }//if(count($teac->subjects)>0)

          }//foreach($teac as $Teacher)

          return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Matters"=>$subjects],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function getMattersTimetable(Request $request)

  public function checkTimetable(Request $request)
  {
        
        $checkTimetable=false;

        try{

            $Timetable=Timetable::query()->where('institution_id',getIdInstitution())->where('period_id',$request->period_id)->where('level_id',$request->level_id)->where('section_id',$request->section_id)->get();

            if(count($Timetable)>0){

                $checkTimetable=true;

            }// if(count($Timetable)>0)

            return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","checkTimetable"=>$checkTimetable],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function checkTimetable(Request $request)


  public function StoreTimeTable(StoreTimeTablePost $request)
  {
        try{

            $institution_id=getIdInstitution();

            $Timetable=Timetable::create([

                   'institution_id'=>$institution_id,

                   'period_id'=>$request->period_id, 

                   'level_id'=>$request->level_id,

                   'section_id'=>$request->section_id,

                   'timetable'=>$request->timetable,

            ]);

        
            foreach($request->timetable2['hours'] as $timet)
            {

              // 0:{hour:'07:00 am 08:00 am'

                if($timet['Monday']!=""){

                   $TimetableDetail=TimetableDetail::create([

                      'timetable_id'=>$Timetable->id,

                      'teacher_id'=>$timet['Monday']['teacher_id'], 

                      'subject_id'=>$timet['Monday']['id'],

                      'day'=>'Monday',

                      'hour'=>$timet['hour'],

                   ]);

                }//if($timet['Monday']!="")

                if($timet['Tuesday']!=""){

                  $TimetableDetail=TimetableDetail::create([

                      'timetable_id'=>$Timetable->id,

                      'teacher_id'=>$timet['Tuesday']['teacher_id'], 

                      'subject_id'=>$timet['Tuesday']['id'],

                      'day'=>'Tuesday',

                      'hour'=>$timet['hour'],

                   ]);

                }//if($timet['Tuesday']!="")

                if($timet['Wednesday']!=""){

                  $TimetableDetail=TimetableDetail::create([

                      'timetable_id'=>$Timetable->id,

                      'teacher_id'=>$timet['Wednesday']['teacher_id'], 

                      'subject_id'=>$timet['Wednesday']['id'],

                      'day'=>'Wednesday',

                      'hour'=>$timet['hour'],

                   ]);

                }//if($timet['Wednesday']!="")

                if($timet['Thursday']!=""){

                  $TimetableDetail=TimetableDetail::create([

                      'timetable_id'=>$Timetable->id,

                      'teacher_id'=>$timet['Thursday']['teacher_id'], 

                      'subject_id'=>$timet['Thursday']['id'],

                      'day'=>'Thursday',

                      'hour'=>$timet['hour'],

                   ]);                  

                }//if($timet['Thursday']!="")

                if($timet['Friday']!=""){

                  $TimetableDetail=TimetableDetail::create([

                      'timetable_id'=>$Timetable->id,

                      'teacher_id'=>$timet['Friday']['teacher_id'], 

                      'subject_id'=>$timet['Friday']['id'],

                      'day'=>'Friday',

                      'hour'=>$timet['hour'],

                   ]);                     

                }//if($timet['Friday']!="")

                if($timet['Saturday']!=""){

                  $TimetableDetail=TimetableDetail::create([

                      'timetable_id'=>$Timetable->id,

                      'teacher_id'=>$timet['Saturday']['teacher_id'], 

                      'subject_id'=>$timet['Saturday']['id'],

                      'day'=>'Saturday',

                      'hour'=>$timet['hour'],

                   ]);                     

                }//if($timet['Saturday']!="")

                if($timet['Sunday']!=""){

                  $TimetableDetail=TimetableDetail::create([

                      'timetable_id'=>$Timetable->id,

                      'teacher_id'=>$timet['Sunday']['teacher_id'], 

                      'subject_id'=>$timet['Sunday']['id'],

                      'day'=>'Sunday',

                      'hour'=>$timet['hour'],

                   ]);                    

                }//if($timet['Sunday']!="")                

            }//foreach($request->timetable2['hours'] as $timet)

            return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)        

  }//public function StoreTimeTable(StoreTimeTablePost $request)

  public function getTimeTables(Request $request){

    $i=1;

    $array=array();

    $timetables=array();

    $Timetable=Timetable::query()->where('institution_id',getIdInstitution())->orderBy('id','ASC');

    $Timetable= $Timetable->with([

            'periods' => function($query){ },
            
            'levels' => function($query){ },

            'sections' => function($query){ },


    ])->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($Timetable as $Time){
      
      $array[]=[
             'num'         => $i,
             'id'          => $Time->id,
             'period'     => $Time->periods->period,
             'level'      => $Time->levels->level,
             'section'    => $Time->sections->section,
      ];

       $i++;

    }//foreach($teac as $Timetable)

    $timetables=[
                'timetables'=>$array,
                'paginate'=>[
                   'total'        =>$Timetable->total(),
                   'current_page' =>$Timetable->currentPage(),
                   'per_page'     =>$Timetable->perPage(),
                   'last_page'    =>$Timetable->lastPage(),
                   'from'         =>$Timetable->firstItem(),
                   'to'           =>$Timetable->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Timetables"=>$timetables],200);

  }//public function getTimeTables(Resquest $request)

    /**
  * Remove the specified resource from storage.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(DestroyTimeTablePost $request)
  {
        try{

          $Timetable=Timetable::find($request->id);

          $TimetableDetail=TimetableDetail::where('timetable_id', $Timetable->id)->first();

          $Timetable->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyTimeTablePost $request)

}
