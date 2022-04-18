<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;

class General {
    public $fName;
    public $mName;
    public $lName;
   // public $fullName;

    public function getName($name)
    {
        $pieces = explode(" ", $name);
        $threeName = array_slice($pieces, 0, 3);
        if (count($threeName) === 1) {
            $this->fName = $threeName[0];
        } elseif (count($threeName) === 2) {
            $this->fName = $threeName[0];
            $this->mName = $threeName[1];
        } elseif (count($threeName) === 3) {
            $this->fName = $threeName[0];
            $this->mName = $threeName[1];
            $this->lName = $threeName[2];
        } else {
            echo 'error';
        }
    }

/*    function saveImage($photo,$path){
        $imgName = 'img-' . time() . '.png';
        Storage::disk('cardQr')->put($imgName, $photo);
        $imagePath= $path.$imgName;
        return $imagePath;
       $image_name = $photo -> move("/img/profileImgs/",$new_name);

    }*/

     function providerType($email) :string {
        $provider_type = explode('@',$email);
        $mail = explode('.',$provider_type[1]);;
        return $mail[0];
    }

   static function saveImage($photo,$folderPath){
       $new_name = rand() . '.' . $photo->getClientOriginalExtension();
       $photo->move(public_path() . '/img/'.$folderPath.'/', $new_name);
       $imagePath= '/img/'.$folderPath.'/';
       return $imagePath;
    }
    static function DeleteImage($imageUrl,$searchAfter, $path){
        $strImage = Str::after($imageUrl, $searchAfter);
        $image = public_path($path.$strImage);
        return unlink($image);
    }


}



