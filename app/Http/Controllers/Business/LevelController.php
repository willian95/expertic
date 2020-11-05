<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLevelPost;
use App\Http\Requests\UpdateLevelPost;
use App\Http\Requests\DestroyLevelPost;
use App\Models\Level;

class LevelController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {
    
    return view('business.level.index');

  }// public function index()

  public function getLevels(Request $request){

    $i=1;

    $array=array();

    $levels=array();

    $Level=Level::query()->where('institution_id',getIdInstitution())->select(['id','institution_id','level'])->orderBy('id','ASC')->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($Level as $lev){

      $array[]=[
             'num'   =>$i,
             'id'    =>$lev->id,
             'level'   =>$lev->level,
      ];

       $i++;

    }//foreach($peri as $Levels)

    $Levels=[
                'levels'=>$array,
                'paginate'=>[
                   'total'        =>$Level->total(),
                   'current_page' =>$Level->currentPage(),
                   'per_page'     =>$Level->perPage(),
                   'last_page'    =>$Level->lastPage(),
                   'from'         =>$Level->firstItem(),
                   'to'           =>$Level->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Levels"=>$Levels],200);

  }//public function getLevels(Resquest $request)

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(StoreLevelPost $request)
  {

        try{

          $Level=Level::create(['level'=>$request->level,'institution_id'=>getIdInstitution()]);   

          return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function store(StoreLevelPost $request)

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(UpdateLevelPost $request)
  {
        try{

          $Level=Level::find($request->id);

          $Level->fill(['level'=>$request->level,'institution_id'=>getIdInstitution()])->save();

          return response()->json(["success" => true, "msg" => "Se actualizaron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function update(UpdateLevelPost $request)

  /**
  * Remove the specified resource from storage.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(DestroyLevelPost $request)
  {
        try{

          $Level=Level::find($request->id);

          $Level->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyLevelPost $request)
}
