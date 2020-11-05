<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectPost;
use App\Http\Requests\UpdateSubjectPost;
use App\Http\Requests\DestroySubjectPost;
use App\Models\Subject;

class SubjectController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {
    
    return view('business.subject.index');

  }// public function index()

  public function getSubjects(Request $request){

    $i=1;

    $array=array();

    $ubjects=array();

    $Subject=Subject::query()->where('institution_id',getIdInstitution())->select(['id','institution_id','subject'])->orderBy('id','ASC')->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($Subject as $sub){

      $array[]=[
             'num'   =>$i,
             'id'    =>$sub->id,
             'subject'   =>$sub->subject,
      ];

       $i++;

    }//foreach($peri as $Subjects)

    $Subjects=[
                'subjects'=>$array,
                'paginate'=>[
                   'total'        =>$Subject->total(),
                   'current_page' =>$Subject->currentPage(),
                   'per_page'     =>$Subject->perPage(),
                   'last_page'    =>$Subject->lastPage(),
                   'from'         =>$Subject->firstItem(),
                   'to'           =>$Subject->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Subjects"=>$Subjects],200);

  }//public function getSubject(Resquest $request)

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(StoreSubjectPost $request)
  {

        try{

          $Subject=Subject::create(['subject'=>$request->subject,'institution_id'=>getIdInstitution()]);   

          return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function store(StoreSubjectPost $request)

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(UpdateSubjectPost $request)
  {
        try{

          $Subject=Subject::find($request->id);

          $Subject->fill(['subject'=>$request->subject,'institution_id'=>getIdInstitution()])->save();

          return response()->json(["success" => true, "msg" => "Se actualizaron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function update(UpdateSubjectPost $request)

  /**
  * Remove the specified resource from storage.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(DestroySubjectPost $request)
  {
        try{

          $Subject=Subject::find($request->id);

          $Subject->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroySubjectPost $request)
}
