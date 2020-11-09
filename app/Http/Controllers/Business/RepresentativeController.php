<?php

namespace App\Http\Controllers\Business;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRepresentativePost;
use App\Http\Requests\StoreRepresentativeViewfinderPost;
use App\Http\Requests\UpdateRepresentativePost;
use App\Http\Requests\DestroyRepresentativePost;
use App\Http\Requests\StoreStudentPost;
use App\Http\Requests\UpdateStudentPost;
use App\Http\Requests\DestroyStudentPost;
use App\User;
use App\Models\UserRole;
use App\Models\InstitutionUser;
use App\Models\Student;
use App\Models\Representative;
use App\Models\RepresentativeStudent;


class RepresentativeController extends Controller
{
    public function __construct() {

    $this->middleware('auth');

  }

  public function create() {
    
    return view('business.representative.create');

  }// public function create()

  public function show() {
    
    return view('business.representative.list');

  }// public function show()

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function storeViewfinder(StoreRepresentativeViewfinderPost $request)
  {
        try{

          return response()->json(["success" => true, "msg" => "Se agrego los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function storeViewfinder(StoreRepresentativePost $request)


  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function storeStudent(StoreStudentPost $request)
  {
        try{

          return response()->json(["success" => true, "msg" => "Se agrego los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function storeStudent(StoreStudentPost $request)

    /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(StoreRepresentativePost $request)
  {

        try{

          $data=$request->all();

          $institution_id=getIdInstitution();

          //Registro de Apoderados

          $User = User::create(['name'=>$request->representative_name,'lastname'=>$request->representative_lastname, 'email'=>$request->email, 'password'=>Hash::make($request->password),]);

          $UserRole = UserRole::create(['user_id'=>$User->id,'role_id'=>4]);

          $InstitutionUser = InstitutionUser::create(['user_id'=>$User->id,'institution_id'=>$institution_id]);

          $data = array_merge($data, ['user_id'=>$User->id,'institution_id'=>$institution_id]);

          $Representative=Representative::create($data);   

          //Registro de Estudiantes

          foreach($request->students as $student){

              $User = User::create(['name'=>$student['student_name'],'lastname'=>$student['student_lastname'], 'email'=>$student['email'], 'password'=>Hash::make($student['password']),]);

              $UserRole = UserRole::create(['user_id'=>$User->id,'role_id'=>6]);

              $InstitutionUser = InstitutionUser::create(['user_id'=>$User->id,'institution_id'=>$institution_id]);

              $student = array_merge($student, ['user_id'=>$User->id,'institution_id'=>$institution_id]);

              $Student=Student::create($student);  
              
              $RepresentativeStudent=RepresentativeStudent::create(['representative_id'=>$Representative->id,'student_id'=>$Student->id]);

          }//foreach($request->students as $student)


          //Registro de Apoderados

          foreach($request->viewfinders as $viewfinder){

            $User = User::create(['name'=>$viewfinder['representative_name'],'lastname'=>$viewfinder['representative_lastname'], 'email'=>$viewfinder['email'], 'password'=>Hash::make($viewfinder['password']),]);

            $UserRole = UserRole::create(['user_id'=>$User->id,'role_id'=>5]);

            $InstitutionUser = InstitutionUser::create(['user_id'=>$User->id,'institution_id'=>$institution_id]);

            $viewfinder = array_merge($viewfinder, ['user_id'=>$User->id,'institution_id'=>$institution_id,'representative_id'=>$Representative->id]);

            $Representative2=Representative::create($viewfinder);              

          }//foreach($request->viewfinders as $viewfinder)

          return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function store(StoreRepresentativePost $request)

  public function getRepresentatives(Resquest $request){

    $i=1;

    $array=array();

    $representatives=array();

    $Representative=Representative::query()->orderBy('id','ASC');

    $Representative= $Representative->with([

            'users' => function($query){ },

            'representatives' => function($query){ },

            'students' => function($query){ },

    ])->paginate(5);


    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($Representative as $repre){
      
      $students=array();

      if(count($repre->students)>0){

         foreach($repre->students as $subject){

          $students[]= $subject->pivot->subject_id;
            
         }//foreach($repre->students as $module)

      }//if(count($repre->students)>0)

      if(count($repre->students)>0){

         foreach($repre->students as $student){

          $students[]= [
                    'user_id'           => $student->pivot->user_id,
                    'institution_id'    => $student->pivot->institution_id,
                    'rut'               => $student->pivot->rut,
                    'student_name'      => $student->pivot->student_name,
                    'student_lastname'  => $student->pivot->student_lastname,
                    'blood_type'        => $student->pivot->blood_type,
                    'phone'             => $student->pivot->phone,
                    'allergies'         => $student->pivot->allergies,
                    'address'           => $student->pivot->address,
          ];

         }//foreach($repre->students as $student)

      }//if(count($repre->students)>0)

      $array[]=[
             'num'                 =>$i,
             'id'                  =>$repre->id,
             'rut'                 =>$repre->rut,
             'teacher_name'        =>$repre->teacher_name,
             'teacher_lastname'    =>$repre->teacher_lastname,
             'email'               =>$repre->users->email,
             'students'            =>$students,   
      ];

       $i++;

    }//foreach($Representative as $repre)

    $representatives=[
                'representatives'=>$array,
                'paginate'=>[
                   'total'        =>$Representative->total(),
                   'current_page' =>$Representative->currentPage(),
                   'per_page'     =>$Representative->perPage(),
                   'last_page'    =>$Representative->lastPage(),
                   'from'         =>$Representative->firstItem(),
                   'to'           =>$Representative->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Representatives"=>$representatives],200);

  }//public function getRepresentatives(Resquest $request)
  
}
