<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvaluationPost;
use App\Http\Requests\UpdateEvaluationPost;
use App\Http\Requests\DestroyEvaluationPost;
use App\Models\Period;
use App\Models\Level;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Student;
use App\Models\GroupStudent;
use App\Models\Evaluation;
use App\Models\EvaluationStudent;
use Carbon\Carbon;

class EvaluationController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {
    
    return view('teacher.evaluation.index');

  }// public function index()

  public function create() {
    
    $hoy = Carbon::now()->format('Y-m-d');

    $Period=Period::where('institution_id',getIdInstitution())->where('end_date_period','>=',$hoy)->orderBy('id','desc')->get();

    return view('teacher.evaluation.create')->with(['Period'=>json_encode($Period), 'Subjects'=>json_encode(getTeacherSubjects())]);

  }// public function index()

  public function store(StoreEvaluationPost $request){

    try{  

        $Evaluation=Evaluation::create([

            'institution_id'=>getIdInstitution(),
                        
            'period_id'=>$request->period_id,
        
            'level_id'=>$request->level_id,
                        
            'section_id'=>$request->section_id,

            'teacher_id'=>getIdTeacher(),

            'subject_id'=>$request->subject_id,

            'date'=>$request->date,            
            
            'start_time'=>$request->start_time,

            'end_time'=>$request->end_time,

        ]);

        $Evaluation->students()->attach($request->get('students'));

        return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

    }catch(\Exception $e){

        return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)    

  }//public function store(StoreEvaluationPost $request)

  public function getEvaluations(Request $request){

    $i=1;

    $array=array();

    $evaluations=array();


    $Evaluation = Evaluation::query()->where('institution_id',getIdInstitution())->orderBy('id','ASC');

    $Evaluation = $Evaluation->with([

            'periods' => function($query){ },

            'levels' => function($query){ },

            'sections' => function($query){ },

            'teachers' => function($query){ },

            'subjects' => function($query){ },

            'students' => function($query){ },

    ])->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($Evaluation as $eval){

        $EvaluationStudent = EvaluationStudent::query()->where('evaluation_id',$eval->id)->orderBy('id','ASC');

        $EvaluationStudent = $EvaluationStudent->with([

            'students' => function($query){ },

        ])->get();


        if(count($EvaluationStudent)>0){


          $students=array();

          foreach($EvaluationStudent as $evalStu){

             $students[]=[
          
                  'id'             =>  $evalStu->students->id,
                  'student_name'   =>  $evalStu->students->student_name.' '.$evalStu->students->student_lastname,
                  'score'          =>  $evalStu->score,

             ];

          }//foreach($EvaluationStudent as $evalStu)

        }//if(count($EvaluationStudent)>0)


      $array[]=[

             'num'            => $i,
             'id'             => $eval->id,
             'period_id'      => $eval->period_id,
             'level_id'       => $eval->level_id,
             'section_id'     => $eval->section_id,
             'subject_id'     => $eval->subject_id,
             'date'           => $eval->date,
             'start_time'     => $eval->start_time,
             'end_time'       => $eval->end_time,
             'date2'          => \Carbon\Carbon::parse($eval->date)->format('d-m-Y'),
             'start_time2'    => \Carbon\Carbon::parse($eval->start_time)->format('g:i A'),
             'end_time2'      => \Carbon\Carbon::parse($eval->end_time)->format('g:i A'),
             'period'         => $eval->periods->period,
             'level'          => $eval->levels->level,
             'section'        => $eval->sections->section,
             'subject'        => $eval->subjects->subject,
             'students'       => $students,

      ];

       $i++;

    }//foreach($Evaluation as $eval)

    $evaluations=[
                'evaluations'=>$array,
                'paginate'=>[
                   'total'        => $Evaluation->total(),
                   'current_page' => $Evaluation->currentPage(),
                   'per_page'     => $Evaluation->perPage(),
                   'last_page'    => $Evaluation->lastPage(),
                   'from'         => $Evaluation->firstItem(),
                   'to'           => $Evaluation->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Evaluations"=>$evaluations],200);

  }//public function getEvaluations(Request $request)

  public function update(UpdateEvaluationPost $request)
  {
        try{

          $Annotation=Annotation::find($request->id);

          $Annotation->fill([
            
                              'subject_id'=>$request->subject_id,

                              'student_id'=>$request->student_id,

                              'date'=>$request->date,            
            
                              'annotation'=>$request->annotation,

                      ])->save();

          return response()->json(["success" => true, "msg" => "Se actualizaron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function update(UpdateEvaluationPost $request)

  public function destroy(DestroyEvaluationPost $request)
  {
        try{

          $Evaluation=Evaluation::find($request->id);

          $Evaluation->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyEvaluationPost $request)

}
