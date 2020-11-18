<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudyPlanPost;
use App\Http\Requests\UpdateStudyPlanPost;
use App\Http\Requests\DestroyStudyPlanPost;
use App\Models\Period;
use App\Models\Level;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Student;
use App\Models\GroupStudent;
use App\Models\StudyPlan;
use Carbon\Carbon;

class StudyPlanController extends Controller
{
  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {
    
    $hoy = Carbon::now()->format('Y-m-d');

    $Period=Period::where('institution_id',getIdInstitution())->where('end_date_period','>=',$hoy)->orderBy('id','desc')->get();

    return view('teacher.studyPlan.index')->with(['Period'=>json_encode($Period), 'Subjects'=>json_encode(getTeacherSubjects())]);

  }// public function index()

  public function store(StoreStudyPlanPost $request){

    try{  

        $StudyPlan=StudyPlan::create([

            'institution_id'=>getIdInstitution(),
                        
            'period_id'=>$request->period_id,
        
            'level_id'=>$request->level_id,
                        
            'section_id'=>$request->section_id,

            'teacher_id'=>getIdTeacher(),

            'subject_id'=>$request->subject_id,

            'start_date_study_plan'=>$request->start_date_study_plan,

            'end_date_study_plan'=>$request->end_date_study_plan,            
            
            'title'=>$request->title,

            'content'=>$request->content,

        ]);

        return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

    }catch(\Exception $e){

        return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)    

  }//public function store(StoreStudyPlanPost $request)

  public function getStudyPlans(Request $request){

    $i=1;

    $array=array();

    $studyPlans=array();

    $StudyPlan = StudyPlan::query()->where('institution_id',getIdInstitution())->orderBy('id','ASC');

    $StudyPlan = $StudyPlan->with([

            'periods' => function($query){ },

            'levels' => function($query){ },

            'sections' => function($query){ },

            'teachers' => function($query){ },

            'subjects' => function($query){ },

    ])->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($StudyPlan as $study){

      $array[]=[

             'num'                      => $i,
             'id'                       => $study->id,
             'period_id'                => $study->period_id,
             'level_id'                 => $study->level_id,
             'section_id'               => $study->section_id,
             'subject_id'               => $study->subject_id,
             'start_date_study_plan'    => $study->start_date_study_plan,
             'end_date_study_plan'      => $study->end_date_study_plan,
             'start_date_study_plan2'   => \Carbon\Carbon::parse($study->start_date_study_plan)->format('d-m-Y'),
             'end_date_study_plan2'     => \Carbon\Carbon::parse($study->end_date_study_plan)->format('d-m-Y'),
             'title'                    => $study->title,
             'content'                  => $study->content,
             'period'                   => $study->periods->period,
             'level'                    => $study->levels->level,
             'section'                  => $study->sections->section,
             'subject'                  => $study->subjects->subject,

      ];

       $i++;

    }//foreach($StudyPlan as $study)

    $studyPlans=[
                'studyPlans'=>$array,
                'paginate'=>[
                   'total'        => $StudyPlan->total(),
                   'current_page' => $StudyPlan->currentPage(),
                   'per_page'     => $StudyPlan->perPage(),
                   'last_page'    => $StudyPlan->lastPage(),
                   'from'         => $StudyPlan->firstItem(),
                   'to'           => $StudyPlan->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","StudyPlans"=>$studyPlans],200);

  }//public function getAnnotations(Resquest $request)

  public function update(UpdateStudyPlanPost $request)
  {
        try{

          $StudyPlan=StudyPlan::find($request->id);

          $StudyPlan->fill([
            
            'start_date_study_plan'=>$request->start_date_study_plan,

            'end_date_study_plan'=>$request->end_date_study_plan,            
            
            'title'=>$request->title,

            'content'=>$request->content,

                      ])->save();

          return response()->json(["success" => true, "msg" => "Se actualizaron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function update(UpdateStudyPlanPost $request)

  public function destroy(DestroyStudyPlanPost $request)
  {
        try{

          $StudyPlan=StudyPlan::find($request->id);

          $StudyPlan->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyStudyPlanPost $request)
}
