<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentPost2;
use App\Http\Requests\UpdateStudentPost2;
use App\Http\Requests\DestroyStudentPost;
use App\User;
use App\Models\UserRole;
use App\Models\InstitutionUser;
use App\Models\Student;
use App\Models\Representative;
use App\Models\RepresentativeStudent;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class StudentController extends Controller
{
  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {
    
    return view('business.student.index');

  }// public function index()

  public function getStudents(Request $request){

    $i=1;

    $array=array();

    $students=array();

    $Student=Student::query()->where('institution_id',getIdInstitution())->orderBy('id','ASC');

    $Student= $Student->with([
            
            'users' => function($query){ },

            'representatives' => function($query){ },

    ])->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($Student as $stud){
      
      $array[]=[
            'num'                 => $i,
            'id'                  => $stud->id,
            'user_id'             => $stud->user_id,
            'institution_id'      => $stud->institution_id,
            'representative_id'   => $stud->representative_id,
            'rut'                 => $stud->rut,
            'student_name'        => $stud->student_name,
            'student_lastname'    => $stud->student_lastname,
            'blood_type'          => $stud->blood_type,
            'phone'               => $stud->phone,
            'allergies'           => $stud->allergies,
            'address'             => $stud->address,
            'email'               => $stud->users->email,
            'representative_rut'  => $stud->representatives->rut,
            'representative_name' => $stud->representatives->representative_name.' '.$stud->representatives->representative_lastname,

      ];

       $i++;

    }//foreach($Student as $stud)

    $students=[
                'students'=>$array,
                'paginate'=>[
                   'total'        =>$Student->total(),
                   'current_page' =>$Student->currentPage(),
                   'per_page'     =>$Student->perPage(),
                   'last_page'    =>$Student->lastPage(),
                   'from'         =>$Student->firstItem(),
                   'to'           =>$Student->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Students"=>$students],200);

  }//public function getStudents(Resquest $request)

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(StoreStudentPost2 $request)
  {

        try{

          $student=$request->student;

          $institution_id=getIdInstitution();

          $User = User::create(['name'=>$request->student['student_name'],'lastname'=>$request->student['student_lastname'], 'email'=>$request->student['email'], 'password'=>Hash::make($request->student['password']),]);

          $UserRole = UserRole::create(['user_id'=>$User->id,'role_id'=>6]);

          $InstitutionUser = InstitutionUser::create(['user_id'=>$User->id,'institution_id'=>$institution_id]);

          $student = array_merge($student, ['user_id'=>$User->id,'institution_id'=>$institution_id,'representative_id'=>$request->student['representative_id']]);

          $Student=Student::create($student);  
              
          $RepresentativeStudent=RepresentativeStudent::create(['representative_id'=>$request->student['representative_id'],'student_id'=>$Student->id]);

          return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function store(StoreStudentPost2 $request)

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(UpdateStudentPost2 $request)
  {

        try{

          $Student=Student::find($request->stud['id']);

          $User=User::where('id', $Student->user_id)->first();

          $User->name = $request->stud['student_name'];

          $User->lastname = $request->stud['student_lastname'];

          $User->email = $request->stud['email'];

          if(array_key_exists('password',$request->stud)!=""){

            $User->password = Hash::make($request->stud['password']);

          }//if($request->stud['password']!="")
    
          $User->save();

          $Student->fill($request->stud)->save();
      
          return response()->json(["success" => true, "msg" => "Se actualizaron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function update(UpdateStudentPost2 $request)

  /**
  * Remove the specified resource from storage.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(DestroyStudentPost $request)
  {
        try{

          $Student=Student::find($request->id);

          $InstitutionUser=InstitutionUser::where('user_id', $Student->user_id)->where('institution_id', $Student->institution_id)->first();

          $UserRole=UserRole::where('user_id', $Student->user_id)->first();

          $user_id=$Student->user_id;

          $User=User::where('id', $user_id)->first();

          $UserRole->delete();

          $InstitutionUser->delete();

          $User->delete();

          $Student->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyStudentPost $request)


   public function SearchRepresentative(Request $request){

    try{   
          
         $array=array();

         $Representative=Representative::query()->where('rut',$request->rut)->where('leading',1)->orderBy('id','ASC');

         $Representative= $Representative->with([

            'users' => function($query){ },

            'representatives' => function($query){ },

            'students' => function($query){ },

         ])->first();

         $viewfinder=array();

         if($Representative!=null){

            if($Representative->representatives!=null){

                $viewfinder[]=[
            
                    'id'                       =>$Representative->representatives['id'],
                    'user_id'                  =>$Representative->representatives['user_id'],
                    'institution_id'           =>$Representative->representatives['institution_id'],
                    'representative_id'        =>$Representative->representatives['representative_id'],
                    'rut'                      =>$Representative->representatives['rut'],                
                    'representative_name'      =>$Representative->representatives['representative_name'],
                    'representative_lastname'  =>$Representative->representatives['representative_lastname'],
                    'address'                  =>$Representative->representatives['address'],
                    'phone'                    =>$Representative->representatives['phone'],
                    'leading'                  =>$Representative->representatives['leading'],
                    'email'                    =>$Representative->representatives->users->email,

                ];
            
            }//if($Representative->representatives!=null)

            $students=array();

        if(count($Representative->students)>0){

            foreach($Representative->students as $student){

                $students[]= [
                    'id'                => $student->id,
                    'user_id'           => $student->user_id,
                    'institution_id'    => $student->institution_id,
                    'representative_id' => $student->representative_id,
                    'rut'               => $student->rut,
                    'student_name'      => $student->student_name,
                    'student_lastname'  => $student->student_lastname,
                    'blood_type'        => $student->blood_type,
                    'phone'             => $student->phone,
                    'allergies'         => $student->allergies,
                    'address'           => $student->address,
                    'email'             => $student->users->email,
                ];

         }  //foreach($repre->students as $student)

        }//if(count($repre->students)>0)

        $array[]=[
             'id'                       => $Representative->id,
             'user_id'                  => $Representative->user_id,
             'institution_id'           => $Representative->institution_id,
             'representative_id'        => $Representative->representative_id,
             'rut'                      => $Representative->rut,                
             'representative_name'      => $Representative->representative_name,
             'representative_lastname'  => $Representative->representative_lastname,
             'address'                  => $Representative->address,
             'phone'                    => $Representative->phone,
             'leading'                  => $Representative->phone,
             'email'                    => $Representative->users->email,
             'viewfinder'               => $viewfinder,   
             'students'                 => $students,   
        ];

        }// if($Representative!=null)

        return response()->json(["success" => true, "msg" => "Se obtenieron los datos exitosamente!","Representative"=>$array],200);

    }catch(\Exception $e){

        return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)

  }//public function SearchRepresentative(Request $request)

}
