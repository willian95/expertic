<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeacherPost;
use App\Http\Requests\UpdateTeacherPost;
use App\Http\Requests\DestroyTeacherPost;
use App\Models\Teacher;
use App\Models\Subject;
use App\User;
use App\Models\UserRole;
use App\Models\InstitutionUser;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class TeacherController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {

    $Subjects=Subject::orderBy('subject','ASC')->get(['id','subject']);
    
    return view('business.teacher.index')->with(['Subjects'=>json_encode($Subjects)]);

  }// public function index()

  public function getTeachers(Request $request){

    $i=1;

    $array=array();

    $teachers=array();

    $Teacher=Teacher::query()->select(['id','user_id','institution_id','rut','teacher_name','teacher_lastname'])->where('institution_id',getIdInstitution())->orderBy('id','ASC');

    $Teacher= $Teacher->with([

            'subjects' => function($query){ },
            
            'users' => function($query){ },

    ])->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($Teacher as $teac){
      
      $subjects=array();

      if(count($teac->subjects)>0){

         foreach($teac->subjects as $subject){

          $subjects[]= $subject->pivot->subject_id;
            
         }//foreach($teac->subjects as $module)

      }//if(count($teac->subjects)>0)

      $array[]=[
             'num'                 =>$i,
             'id'                  =>$teac->id,
             'rut'                 =>$teac->rut,
             'teacher_name'        =>$teac->teacher_name,
             'teacher_lastname'    =>$teac->teacher_lastname,
             'email'               =>$teac->users->email,
             'subjects'            =>$subjects,   
      ];

       $i++;

    }//foreach($teac as $Teacher)

    $teachers=[
                'teachers'=>$array,
                'paginate'=>[
                   'total'        =>$Teacher->total(),
                   'current_page' =>$Teacher->currentPage(),
                   'per_page'     =>$Teacher->perPage(),
                   'last_page'    =>$Teacher->lastPage(),
                   'from'         =>$Teacher->firstItem(),
                   'to'           =>$Teacher->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Teachers"=>$teachers],200);

  }//public function getTeacherss(Resquest $request)


    public function getTeachersJson(){

    $i=1;

    $array=array();

    $teachers=array();

    $Teacher=Teacher::query()->where('institution_id',getIdInstitution())->orderBy('teacher_name','ASC');

    $Teacher= $Teacher->with([

            'subjects' => function($query){ },
            
            'users' => function($query){ },

    ])->get();


    foreach($Teacher as $teac){
      
      $subjects=array();

      if(count($teac->subjects)>0){

         foreach($teac->subjects as $subject){

          $subjects[]= $subject->pivot->subject_id;
            
         }//foreach($teac->subjects as $module)

      }//if(count($teac->subjects)>0)

      $array[]=[
             'num'                 =>$i,
             'id'                  =>$teac->id,
             'rut'                 =>$teac->rut,
             'teacher_name'        =>$teac->teacher_name,
             'teacher_lastname'    =>$teac->teacher_lastname,
             'email'               =>$teac->users->email,
             'subjects'            =>$subjects,   
      ];

       $i++;

    }//foreach($teac as $Teacher)

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Teachers"=>$array],200);

  }//public function getTeacherss()


  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(StoreTeacherPost $request)
  {

        try{

          $data=$request->all();

          $institution_id=getIdInstitution();

          $User = User::create(['name'=>$request->teacher_name,'lastname'=>$request->teacher_lastname, 'email'=>$request->email, 'password'=>Hash::make($request->password),]);

          $UserRole = UserRole::create(['user_id'=>$User->id,'role_id'=>3]);

          $InstitutionUser = InstitutionUser::create(['user_id'=>$User->id,'institution_id'=>$institution_id]);

          $data = array_merge($data, ['user_id'=>$User->id,'institution_id'=>$institution_id]);

          $Teacher=Teacher::create($data);   

          $Teacher->subjects()->attach($request->get('subjects'));

          return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function store(StoreTeacherPost $request)

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(UpdateTeacherPost $request)
  {
        try{

          $Teacher=Teacher::find($request->data['id']);

          $User=User::where('id', $Teacher->user_id)->first();

          $User->name = $request->data['teacher_name'];

          $User->lastname = $request->data['teacher_lastname'];

          $User->email = $request->data['email'];

          if(array_key_exists('password',$request->data)!=""){

            $User->password = Hash::make($request->data['password']);

          }//if($request->data['password']!="")
    
          $User->save();

          $Teacher->fill($request->all())->save();
      
          $Teacher->subjects()->sync($request->data['subjects']); 

          return response()->json(["success" => true, "msg" => "Se actualizaron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function update(UpdateTeacherPost $request)

  /**
  * Remove the specified resource from storage.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(DestroyTeacherPost $request)
  {
        try{

          $Teacher=Teacher::find($request->id);

          $InstitutionUser=InstitutionUser::where('user_id', $Teacher->user_id)->where('institution_id', $Teacher->institution_id)->first();

          $UserRole=UserRole::where('user_id', $Teacher->user_id)->first();

          $user_id=$Teacher->user_id;

          $User=User::where('id', $user_id)->first();

          $UserRole->delete();

          $InstitutionUser->delete();

          $User->delete();

          $Teacher->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyTeacherPost $request)

}
