<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnnotationPost;
use App\Http\Requests\UpdateAnnotationPost;
use App\Http\Requests\DestroyAnnotationPost;
use App\Models\Period;
use App\Models\Level;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Student;
use App\Models\GroupStudent;
use App\Models\Annotation;
use Carbon\Carbon;

class AnnotationController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {
    
    $hoy = Carbon::now()->format('Y-m-d');

    $Period=Period::where('institution_id',getIdInstitution())->where('end_date_period','>=',$hoy)->orderBy('id','desc')->get();

    return view('teacher.annotations.index')->with(['Period'=>json_encode($Period), 'Subjects'=>json_encode(getTeacherSubjects())]);

  }// public function index()

  public function store(StoreAnnotationPost $request){

    try{  

        $Annotation=Annotation::create([

            'institution_id'=>getIdInstitution(),
                        
            'period_id'=>$request->period_id,
        
            'level_id'=>$request->level_id,
                        
            'section_id'=>$request->section_id,

            'teacher_id'=>getIdTeacher(),

            'subject_id'=>$request->subject_id,

            'student_id'=>$request->student_id,

            'date'=>$request->date,            
            
            'annotation'=>$request->annotation,
        
        ]);

        return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

    }catch(\Exception $e){

        return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)    

  }//public function store(StoreAnnotationPost $request)

  public function getAnnotations(Request $request){

    $i=1;

    $array=array();

    $annotations=array();

    $Annotation = Annotation::query()->where('institution_id',getIdInstitution())->orderBy('id','ASC');

    $Annotation = $Annotation->with([

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

    foreach($Annotation as $annot){

      $array[]=[

             'num'         => $i,
             'id'          => $annot->id,
             'period_id'   => $annot->period_id,
             'level_id'    => $annot->level_id,
             'section_id'  => $annot->section_id,
             'subject_id'  => $annot->subject_id,
             'student_id'  => $annot->student_id,
             'date'        => $annot->date,
             'annotation'  => $annot->annotation,
             'date2'       => \Carbon\Carbon::parse($annot->date)->format('d-m-Y'),
             'period'      => $annot->periods->period,
             'level'       => $annot->levels->level,
             'section'     => $annot->sections->section,
             'subject'    => $annot->subjects->subject,
             'student_name'    => $annot->students->student_name.' '.$annot->students->student_lastname,

      ];

       $i++;

    }//foreach($Annotation as $annot)

    $annotations=[
                'annotations'=>$array,
                'paginate'=>[
                   'total'        => $Annotation->total(),
                   'current_page' => $Annotation->currentPage(),
                   'per_page'     => $Annotation->perPage(),
                   'last_page'    => $Annotation->lastPage(),
                   'from'         => $Annotation->firstItem(),
                   'to'           => $Annotation->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Annotations"=>$annotations],200);

  }//public function getAnnotations(Resquest $request)

  public function update(UpdateAnnotationPost $request)
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

  }//public function update(UpdatePeriodPost $request)

  public function destroy(DestroyAnnotationPost $request)
  {
        try{

          $Annotation=Annotation::find($request->id);

          $Annotation->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyAnnotationPost $request)

}
