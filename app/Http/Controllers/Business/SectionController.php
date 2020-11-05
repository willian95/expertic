<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSectionPost;
use App\Http\Requests\UpdateSectionPost;
use App\Http\Requests\DestroySectionPost;
use App\Models\Section;

class SectionController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {
    
    return view('business.section.index');

  }// public function index()

  public function getSections(Request $request){

    $i=1;

    $array=array();

    $sections=array();

    $Section=Section::query()->where('institution_id',getIdInstitution())->select(['id','institution_id','section'])->orderBy('id','ASC')->paginate(5);

    if($request->page!=1){

      $i=$i+(5*($request->page-1));

    }//if($request->page!=1)

    foreach($Section as $sec){

      $array[]=[
             'num'   =>$i,
             'id'    =>$sec->id,
             'section'   =>$sec->section,
      ];

       $i++;

    }//foreach($peri as $Sections)

    $Sections=[
                'sections'=>$array,
                'paginate'=>[
                   'total'        =>$Section->total(),
                   'current_page' =>$Section->currentPage(),
                   'per_page'     =>$Section->perPage(),
                   'last_page'    =>$Section->lastPage(),
                   'from'         =>$Section->firstItem(),
                   'to'           =>$Section->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Sections"=>$Sections],200);

  }//public function getSection(Resquest $request)

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(StoreSectionPost $request)
  {

        try{

          $Section=Section::create(['section'=>$request->section,'institution_id'=>getIdInstitution()]);   

          return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function store(StoreSectionPost $request)

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(UpdateSectionPost $request)
  {
        try{

          $Section=Section::find($request->id);

          $Section->fill(['section'=>$request->section,'institution_id'=>getIdInstitution()])->save();

          return response()->json(["success" => true, "msg" => "Se actualizaron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function update(UpdateSectionPost $request)

  /**
  * Remove the specified resource from storage.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(DestroySectionPost $request)
  {
        try{

          $Section=Section::find($request->id);

          $Section->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroySectionPost $request)
}
