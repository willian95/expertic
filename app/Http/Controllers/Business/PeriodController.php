<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePeriodPost;
use App\Http\Requests\UpdatePeriodPost;
use App\Http\Requests\DestroyPeriodPost;
use App\Models\Period;

class PeriodController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {
    
    return view('business.period.index');

  }// public function index()

  public function getPeriods(Request $request){

    $i=1;

    $array=array();

    $periods=array();

    $Period=Period::query()->where('institution_id',getIdInstitution())->select(['id','institution_id','period'])->orderBy('id','ASC')->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($Period as $peri){

      $array[]=[
             'num'   =>$i,
             'id'    =>$peri->id,
             'period'   =>$peri->period,
      ];

       $i++;

    }//foreach($peri as $Periods)

    $periods=[
                'periods'=>$array,
                'paginate'=>[
                   'total'        =>$Period->total(),
                   'current_page' =>$Period->currentPage(),
                   'per_page'     =>$Period->perPage(),
                   'last_page'    =>$Period->lastPage(),
                   'from'         =>$Period->firstItem(),
                   'to'           =>$Period->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Periods"=>$periods],200);

  }//public function getPeriods(Resquest $request)

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(StorePeriodPost $request)
  {

        try{

          $Period=Period::create(['period'=>$request->period,'institution_id'=>getIdInstitution()]);   

          return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function store(StorePeriodPost $request)

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(UpdatePeriodPost $request)
  {
        try{

          $Period=Period::find($request->id);

          $Period->fill(['period'=>$request->period,'institution_id'=>getIdInstitution()])->save();

          return response()->json(["success" => true, "msg" => "Se actualizaron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function update(UpdatePeriodPost $request)

  /**
  * Remove the specified resource from storage.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(DestroyPeriodPost $request)
  {
        try{

          $Period=Period::find($request->id);

          $Period->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyPeriodPost $request)
    
}
