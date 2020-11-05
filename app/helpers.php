<?php

  use App\Models\UserRole;
  use App\Models\InstitutionUser;
  use Illuminate\Support\Str;

  function saveImage($value, $destination_path, $disk='publicmedia', $size = array(), $watermark = array())
  {

    $default_size = [
      'imagesize' => [
        'width' => 1024,
        'height' => 768,
        'quality'=>80
      ],
      'mediumthumbsize' => [
        'width' => 400,
        'height' => 300,
        'quality'=>80
      ],
      'smallthumbsize' => [
        'width' => 100,
        'height' => 80,
        'quality'=>80
      ],
    ];
    $size = json_decode(json_encode(array_merge($default_size, $size)));
    //Defined return.
    if (Str::endsWith($value, '.jpg')) {
      return $value;
    }

    // if a base64 was sent, store it in the db
    if (Str::startsWith($value, 'data:image')) {
      // 0. Make the image
      $image = \Image::make($value);
      // resize and prevent possible upsizing

      $image->resize($size->imagesize->width, $size->imagesize->height, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      });
      // 2. Store the image on disk.
      \Storage::disk($disk)->put($destination_path, $image->stream('jpg', $size->imagesize->quality));

      // 3. Return the path
      return $destination_path;
    }

    // if the image was erased
    if ($value == null) {
      // delete the image from disk
      \Storage::disk($disk)->delete($destination_path);

      // set null in the database column
      return null;
    }


  }//function saveImage($value, $destination_path, $disk='publicmedia', $size = array(), $watermark = array())

  function role(){

        $role=UserRole::query()->where('user_id',auth()->id())->select(['id','user_id','role_id'])->orderBy('id','DESC');

        $role= $role->with([

            'role' => function($query){

                $query->select('id','role_name','role_description');

            },  

        ])->get(['id','user_id','role_id']);

        if(count($role)==0){
          $role_name="";
          $role_description="";
        }
        else{
          $role_name=$role[0]->role->role_name;
          $role_description=$role[0]->role->role_description;
        }
           
        
        $role=[
                 'role_name'=>$role_name,
                 'role_description'=>$role_description
        ];   
      
      return $role;

  }//function role()


  function roleName(){

        $role=UserRole::query()->where('user_id',auth()->id())->select(['id','user_id','role_id'])->orderBy('id','DESC');

        $role= $role->with([

            'role' => function($query){

                $query->select('id','role_name','role_description');

            },  

        ])->get(['id','user_id','role_id']);

        if(count($role)==0){
          $role_name="";
        }
        else{
          $role_name=$role[0]->role->role_name;
        }
            
      return $role_name;

  }//function roleName()  

  
  function getIdInstitution(){

    $InstitutionUser=InstitutionUser::where('user_id', auth()->id())->first();

    return $InstitutionUser->institution_id;

  }//function getIdInstitution()


?>