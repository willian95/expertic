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
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


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

              $student = array_merge($student, ['user_id'=>$User->id,'institution_id'=>$institution_id,'representative_id'=>$Representative->id]);

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

  public function getRepresentatives(Request $request){

    $i=1;

    $array=array();

    $representatives=array();

    $Representative=Representative::query()->where('leading',1)->orderBy('id','ASC');

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

      $viewfinder=array();
      

      if($repre->representatives!=null){

          $viewfinder[]=[
            
             'id'                       =>$repre->representatives['id'],
             'user_id'                  =>$repre->representatives['user_id'],
             'institution_id'           =>$repre->representatives['institution_id'],
             'representative_id'        =>$repre->representatives['representative_id'],
             'rut'                      =>$repre->representatives['rut'],                
             'representative_name'      =>$repre->representatives['representative_name'],
             'representative_lastname'  =>$repre->representatives['representative_lastname'],
             'address'                  =>$repre->representatives['address'],
             'phone'                    =>$repre->representatives['phone'],
             'leading'                  =>$repre->representatives['leading'],
             'email'                    =>$repre->users->email,

          ];
            
      }//if(count($repre->students)>0)

      if(count($repre->students)>0){

         foreach($repre->students as $student){

          $students[]= [
                    'user_id'           => $student->user_id,
                    'institution_id'    => $student->institution_id,
                    'rut'               => $student->rut,
                    'student_name'      => $student->student_name,
                    'student_lastname'  => $student->student_lastname,
                    'blood_type'        => $student->blood_type,
                    'phone'             => $student->phone,
                    'allergies'         => $student->allergies,
                    'address'           => $student->address,
          ];

         }//foreach($repre->students as $student)

      }//if(count($repre->students)>0)

      $array[]=[
             'num'                      =>$i,
             'id'                       =>$repre->id,
             'user_id'                  =>$repre->user_id,
             'institution_id'           =>$repre->institution_id,
             'representative_id'        =>$repre->representative_id,
             'rut'                      =>$repre->rut,                
             'representative_name'      =>$repre->representative_name,
             'representative_lastname'  =>$repre->representative_lastname,
             'address'                  =>$repre->address,
             'phone'                    =>$repre->phone,
             'leading'                  =>$repre->phone,
             'email'                    =>$repre->users->email,
             'viewfinder'               =>$viewfinder,   
             'students'                 =>$students,   
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

  /**
  * Remove the specified resource from storage.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(DestroyRepresentativePost $request)
  {
        try{

          $Representative=Representative::find($request->id);

          //Borrado de Apoderado Visor

          $Viewfinder=Representative::where('representative_id', $Representative->id)->first();

          if(!empty($Viewfinder)){

            $InstitutionUser=InstitutionUser::where('user_id', $Viewfinder->user_id)->where('institution_id', $Viewfinder->institution_id)->first();

            $UserRole=UserRole::where('user_id', $Viewfinder->user_id)->first();

            $user_id=$Viewfinder->user_id;

            $User=User::where('id', $user_id)->first();

            $UserRole->delete();

            $InstitutionUser->delete();

            $User->delete();

            $Viewfinder->delete();

          }//if(!empty($Viewfinder))

          //Borrado de Estudiantes

          $user_id=Student::where('representative_id',$Representative->id)->get(['user_id']);

          $student_id=Student::where('representative_id',$Representative->id)->get(['id']);

          if(count($user_id)>0){

              $RepresentativeStudent=RepresentativeStudent::whereIn('student_id',$student_id)->delete();

              $InstitutionUser = InstitutionUser::whereIn('user_id',$user_id)->where('institution_id', $Representative->institution_id)->delete();

              $UserRole = UserRole::whereIn('user_id',$user_id)->delete();

              $User = User::whereIn('id',$user_id)->delete();

          }//if(count($user_id)>0)

          $Representative->students()->delete();

          //Borrado de Apoderado Principal

          $InstitutionUser=InstitutionUser::where('user_id', $Representative->user_id)->where('institution_id', $Representative->institution_id)->first();

          $UserRole=UserRole::where('user_id', $Representative->user_id)->first();

          $user_id=$Representative->user_id;

          $User=User::where('id', $user_id)->first();

          $UserRole->delete();

          $InstitutionUser->delete();

          $User->delete();

          $Representative->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyRepresentativePost $request)
  
}
