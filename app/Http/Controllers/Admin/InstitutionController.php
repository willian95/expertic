<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInstitutionPost;
use App\Http\Requests\UpdateInstitutionPost;
use App\Http\Requests\DestroyInstitutionPost;
use App\Models\Module;
use App\Models\Institution;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Models\UserRole;
use App\Models\InstitutionUser;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Validator;

class InstitutionController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {

    $Modules=Module::orderBy('module_name','ASC')->get(['id','module_name','module_description']);
    
    return view('admin.business.index')->with(['Modules'=>json_encode($Modules)]);

  }// public function index()

  public function getInstitutions(Request $request){

    $i=1;

    $array=array();

    $institutions=array();

    $Institution=Institution::query()->select(['id','rut','institution_name','reason_social','address','website_link','logo',])->orderBy('id','ASC');

    $Institution= $Institution->with([

            'modules' => function($query){ },  

    ])->paginate(5);

    if($request->page!=1){
      $i=$i+(5*($request->page-1));
    }//if($request->page!=1)

    foreach($Institution as $inst){
      
      $modules=array();

      if(count($inst->modules)>0){

         foreach($inst->modules as $module){

          $modules[]= $module->pivot->module_id;
            
         }//foreach($inst->modules as $module)

      }//if(count($inst->modules)>0)

      $array[]=[
             'num'              =>$i,
             'id'               =>$inst->id,
             'rut'              =>$inst->rut,
             'institution_name' =>$inst->institution_name,
             'reason_social'    =>$inst->reason_social,
             'address'          =>$inst->address,
             'website_link'     =>$inst->website_link,
             'logo'             =>$inst->logo,
             'modules'          =>$modules,   
      ];

       $i++;

    }//foreach($inst as $Institution)

    $institutions=[
                'institutions'=>$array,
                'paginate'=>[
                   'total'        =>$Institution->total(),
                   'current_page' =>$Institution->currentPage(),
                   'per_page'     =>$Institution->perPage(),
                   'last_page'    =>$Institution->lastPage(),
                   'from'         =>$Institution->firstItem(),
                   'to'           =>$Institution->lastPage(),

                ]
    ];

    return response()->json(["success" => true, "msg" => "Datos obtenidos exitosamente!","Institutions"=>$institutions],200);

  }//public function getInstitutions(Resquest $request)

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(StoreInstitutionPost $request)
  {

        try{

          $data=$request->all();

          unset($data['logo']);

          $Institution=Institution::create($data);   

          if($request->logo!=""){

            $image=saveImage($request->logo,'institutions/'.$Institution->id.'.jpg');

            $Institution->logo = $image;

            $Institution->save();

          }//if($request->logo!="")

          $Institution->modules()->attach($request->get('modules'));

          $this->CreateUserInstitution($Institution->id);

          return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function store(StoreInstitutionPost $request)

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(UpdateInstitutionPost $request)
  {
        try{

          $Institution=Institution::find($request->id);

          $data=$request->all();

          unset($data['logo']);

          $Institution->fill($data)->save();

          if($request->logo!=""){

            $image=saveImage($request->logo,'institutions/'.$Institution->id.'.jpg');

            $Institution->logo = $image;

            $Institution->save();

          }//if($request->logo!="")
      
          $Institution->modules()->sync($request->get('modules')); 

          return response()->json(["success" => true, "msg" => "Se actualizaron los datos exitosamente!"],200);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function update(UpdateInstitutionPost $request)

  /**
  * Remove the specified resource from storage.
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(DestroyInstitutionPost $request)
  {
        try{

          $Institution=Institution::find($request->id);

          if($Institution->logo!=null){

            $ruta_acceso_imagen = public_path().'/'.$Institution->logo; 

            unlink($ruta_acceso_imagen);

          }//if($Institution->logo!=null)

          $Institution->delete();

          return response()->json(["success" => true, "msg" => "Se elimino los datos exitosamente!"],200);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

   }//public function destroy(DestroyInstitutionPost $request)
  /**
  * Create user Institution.
  * @param  int  $id
  * 
  */
  public function CreateUserInstitution($idInstitution)
  {
        try{
        
           $User = User::create(['name'=>'Usuario 2','lastname'=>'Admin de Empresa '.$idInstitution , 'email'=>'businessadmin'.$idInstitution.'@gmail.com', 'password'=>Hash::make('12345678'),]);

           $UserRole = UserRole::create(['user_id'=>$User->id,'role_id'=>2]);

           $InstitutionUser = InstitutionUser::create(['user_id'=>$User->id,'institution_id'=>$idInstitution]);

        }catch(\Exception $e){

          return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

  }//public function CreateUserInstitution($idInstitution)

}
