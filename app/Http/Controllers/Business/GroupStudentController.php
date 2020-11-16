<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGroupStudentPost;
use App\Http\Requests\DestroyGroupStudentPost;
use App\Models\Period;
use App\Models\Level;
use App\Models\Section;
use App\Models\GroupStudent;
use App\Models\Student;
use Carbon\Carbon;

class GroupStudentController extends Controller
{
  public function __construct() {

    $this->middleware('auth');

  }

  public function list() {
    
    return view('business.groupStudent.list');

  }// public function index()

  public function create() {

    $hoy = Carbon::now()->format('Y-m-d');

    $Period=Period::where('institution_id',getIdInstitution())->where('end_date_period','>=',$hoy)->orderBy('id','desc')->get();

    $Level=Level::where('institution_id',getIdInstitution())->orderBy('level','asc')->get();

    $Section=Section::where('institution_id',getIdInstitution())->orderBy('section','asc')->get();

    return view('business.groupStudent.create')->with(['Period'=>json_encode($Period),'Level'=>json_encode($Level),'Section'=>json_encode($Section)]);

  }//public function index()

  public function SearchStudent(Request $request){

    try{   
          
         $hoy = Carbon::now()->format('Y-m-d');

         $Student=Student::query()->where('institution_id',getIdInstitution())->where('rut',$request->rut)->first();

         if($Student==null){

            return response()->json(["success" => false, "msg" => "El rut introducido no se encuentra asociado a ningun estudiante!"],200);

         }//if($Student==1)
         else{

            $Period=Period::where('institution_id',getIdInstitution())->where('id',$request->period_id)->select('id')->where('end_date_period','>=',$hoy)->orderBy('id','desc')->get();

            if(count($Period)==0){

                return response()->json(["success" => false, "msg" => "No existen periodos vigentes!"],200);

            }//if(count()==0)
            else{

                $GroupStudent=GroupStudent::query()->where('institution_id',getIdInstitution())->whereIn('period_id',$Period)->where('period_id',$request->period_id)->where('level_id',$request->level_id)->where('student_id',$Student->id)->where('active',1)->get();

                if(count($GroupStudent)!=0){

                  return response()->json(["success" => false, "msg" => "El estudiante a buscar ya se encuentra asociado a un grupo vigente!"],200);

                }//if(count($GroupStudent)!=0)

            }//if(count()==0)

         }//if($Student==null)

        return response()->json(["success" => true, "msg" => "Se obtenieron los datos exitosamente!","Student"=>$Student],200);

    }catch(\Exception $e){

        return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)

  }//public function SearchRepresentative(Request $request)

  public function CheckGroup(Request $request){

    try{   
          
       $GroupStudent=GroupStudent::query()->where('institution_id',getIdInstitution())->where('period_id',$request->period_id)->where('level_id',$request->level_id)->where('section_id',$request->section_id)->where('active',1)->get();

      if(count($GroupStudent)>0){

        return response()->json(["success" => false, "msg" => "Ya existe un grupo creado con estas caracteristicas!"],200);

      }//if(count($GroupStudent)!=0)

      return response()->json(["success" => true, "msg" => "No existe grupo creado con estas caracteristicas!"],200);

    }catch(\Exception $e){

        return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)    

  }//public function CheckGroup(Request $request)

  public function store(StoreGroupStudentPost $request){

    try{  

          $IdInstitution=getIdInstitution();

          foreach($request->students as $student){
          
              $GroupStudent=GroupStudent::create([

                        'institution_id'=>$IdInstitution,
                        
                        'period_id'=>$request->period_id,
        
                        'level_id'=>$request->level_id,
                        
                        'section_id'=>$request->section_id,

                        'student_id'=>$student['id'],

              ]);

          }//foreach($request->students as $student)

          return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

    }catch(\Exception $e){

        return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)    

  }//public function store(StoreGroupStudentPost $request)

  public function getGroupStudents(Request $request)
  {

    try{

    $i=1;

    $array=array();

    $groupStudent=array();

    $GroupStudent=GroupStudent::query()->where('institution_id',getIdInstitution())->select(['period_id','level_id','section_id'])->distinct(['period_id','level_id','section_id']);

    $GroupStudent= $GroupStudent->with([

            'periods' => function($query){ },

            'levels' => function($query){ },

            'sections' => function($query){ },

    ])->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($GroupStudent as $group){

      $id=GroupStudent::query()->where('institution_id',getIdInstitution())->select('id')->where('period_id',$group->period_id)->where('level_id',$group->level_id)->where('section_id',$group->section_id)->first('id');

      $array[]=[
             'num'        =>$i,
             'id'         =>$id['id'],
             'period'     =>$group->periods->period,
             'level'      =>$group->levels->level,
             'section'    =>$group->sections->section,
      ];

       $i++;

    }//foreach($GroupStudent as $group)

    $groupStudent=[
                'groupStudents'=>$array,
                'paginate'=>[
                   'total'        =>$GroupStudent->total(),
                   'current_page' =>$GroupStudent->currentPage(),
                   'per_page'     =>$GroupStudent->perPage(),
                   'last_page'    =>$GroupStudent->lastPage(),
                   'from'         =>$GroupStudent->firstItem(),
                   'to'           =>$GroupStudent->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","GroupStudents"=>$groupStudent],200);

    }catch(\Exception $e){

      return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)    

  }//public function getGroupStudent(Resquest $request)

  public function destroy(DestroyGroupStudentPost $request)
  {
        try{

          $GroupStudent=GroupStudent::find($request->id);

          $GroupStudent2 = GroupStudent::where('institution_id', getIdInstitution())->where('period_id',$GroupStudent->period_id)->where('level_id',$GroupStudent->level_id)->where('section_id',$GroupStudent->section_id)->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyGroupStudentPost $request)

  public function update($id) {

    $Period=Period::where('institution_id',getIdInstitution())->orderBy('id','desc')->get();

    $Level=Level::where('institution_id',getIdInstitution())->orderBy('level','asc')->get();

    $Section=Section::where('institution_id',getIdInstitution())->orderBy('section','asc')->get();

    return view('business.groupStudent.update')->with(['Period'=>json_encode($Period),'Level'=>json_encode($Level),'Section'=>json_encode($Section),'DataGroupStudents'=>json_encode($this->getDataGroupStudents($id))]);

  }// public function update()


  public function getDataGroupStudents($id){

    $array=array();

    $groupStudent=array();

    $GetGroupStudent=GroupStudent::query()->where('institution_id',getIdInstitution())->where('id',$id)->first();
    
    $GroupStudent=GroupStudent::query()->where('institution_id',getIdInstitution())->where('period_id',$GetGroupStudent['period_id'])->where('level_id',$GetGroupStudent['level_id'])->where('section_id',$GetGroupStudent['section_id']);

    $GroupStudent= $GroupStudent->with([

            'periods' => function($query){ },

            'levels' => function($query){ },

            'sections' => function($query){ },
                        
            'students' => function($query){ },

    ])->get();

    foreach($GroupStudent as $group){
      
      $array[]=[
             'id'                =>$group->id,
             'rut'               =>$group->students->rut,
             'student_name'      =>$group->students->student_name,
             'student_lastname'  =>$group->students->student_lastname,
      ];

    }//foreach($GroupStudent as $group)

    $groupStudent=[

                'students'    => $array,
                'period_id'   =>$GroupStudent[0]->period_id,
                'level_id'    =>$GroupStudent[0]->level_id,
                'section_id'  =>$GroupStudent[0]->section_id,
    ];

    return $groupStudent;

  }//public function getDataGroupStudents($id)

  public function AddStudentGroup(Request $request)
  {

    try{

          $IdInstitution=getIdInstitution();
          
          $GroupStudent=GroupStudent::create([

            'institution_id'=>$IdInstitution,
                        
            'period_id'=>$request->period_id,
        
            'level_id'=>$request->level_id,
                        
            'section_id'=>$request->section_id,

            'student_id'=>$request->student_id,

          ]);

      return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

    }catch(\Exception $e){

      return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)

  }//public function AddStudentGroup(Resquest $request)

  public function getGroupStudents2(Request $request)
  {

    try{

        return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","DataGroupStudents"=>$this->getDataGroupStudents($request->id)],200);

    }catch(\Exception $e){

      return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)

  }//public function getGroupStudents2(Resquest $request)

  public function destroy2(Request $request)
  {
        try{

          $redirect=0;
          
          $GroupStudent=GroupStudent::find($request->id);

          $GroupStudent2 = GroupStudent::where('institution_id', getIdInstitution())->where('period_id',$GroupStudent->period_id)->where('level_id',$GroupStudent->level_id)->where('section_id',$GroupStudent->section_id)->get();

          if(count($GroupStudent2)==1)
             
             $redirect=1;

          $GroupStudent=GroupStudent::find($request->id);

          $GroupStudent->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!","redirect"=>$redirect],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyGroupStudentPost $request)

    public function getLevels(Request $request) 
    {
    
      try{

        $GroupStudent=GroupStudent::query()->where('institution_id',getIdInstitution())->where('period_id',$request->period_id)->select(['period_id','level_id','section_id'])->distinct(['period_id','level_id','section_id']);

        $GroupStudent= $GroupStudent->with([

                'periods' => function($query){ },

                'levels' => function($query){ },

                'sections' => function($query){ },

         ])->get();

        $array=array();

        $i=1;
 
        foreach($GroupStudent as $group)
        {

            $array[]=[
              'num'           =>$i,
              'period_id'     =>$group->periods->id,
              'period'        =>$group->periods->period,
              'level_id'      =>$group->levels->id,
              'level'         =>$group->levels->level,
              'section_id'    =>$group->sections->id,
              'section'       =>$group->sections->section,
            ];

            $i++;

        }//foreach($GroupStudent as $group)

        return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Levels"=>$array],200);

      }catch(\Exception $e){

        return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

       }//catch(\Exception $e)    

  }//public function getLevels(Request $request)

  public function getSections(Request $request) {

    try{

        $GroupStudent=GroupStudent::query()->where('institution_id',getIdInstitution())->where('period_id',$request->period_id)->where('level_id',$request->level_id)->select(['period_id','level_id','section_id'])->distinct(['period_id','level_id','section_id']);

        $GroupStudent= $GroupStudent->with([

                'periods' => function($query){ },

                'levels' => function($query){ },

                'sections' => function($query){ },

         ])->get();

        $array=array();

        $i=1;
 
        foreach($GroupStudent as $group)
        {

            $array[]=[
              'num'           =>$i,
              'period_id'     =>$group->periods->id,
              'period'        =>$group->periods->period,
              'level_id'      =>$group->levels->id,
              'level'         =>$group->levels->level,
              'section_id'    =>$group->sections->id,
              'section'       =>$group->sections->section,
            ];

            $i++;

        }//foreach($GroupStudent as $group)

        return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Sections"=>$array],200);

    }catch(\Exception $e){

      return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)    

  }//public function getSections(Request $request)

  public function getStudents(Request $request) {

    try{

        $GroupStudent=GroupStudent::query()->where('institution_id',getIdInstitution())->where('period_id',$request->period_id)->where('level_id',$request->level_id)->where('section_id',$request->section_id);

        $GroupStudent= $GroupStudent->with([

                'periods' => function($query){ },

                'levels' => function($query){ },

                'sections' => function($query){ },

                'students' => function($query){ },

         ])->get();

        $array=array();

        $i=1;
 
        foreach($GroupStudent as $group)
        {

            $array[]=[
              'num'                 =>$i,
              'period_id'           =>$group->periods->id,
              'period'              =>$group->periods->period,
              'level_id'            =>$group->levels->id,
              'level'               =>$group->levels->level,
              'section_id'          =>$group->sections->id,
              'section'             =>$group->sections->section,
              'student_id'          =>$group->students->id,
              'rut'                 =>$group->students->rut,
              'student_name'        =>$group->students->student_name,
              'student_lastname'    =>$group->students->student_lastname,
              'student_names'       =>$group->students->student_name.' '.$group->students->student_lastname,
            ];

            $i++;

        }//foreach($GroupStudent as $group)

        return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Students"=>$array],200);

    }catch(\Exception $e){

      return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)    

  }//public function getStudents(Request $request)

}
