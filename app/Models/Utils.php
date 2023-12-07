<?php 

namespace App\Models;

class Utils
{

    
    public static function file_uploader($files){

        $uploads = [];
        foreach($files as $key => $file){
            $fileName = $file['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $fileExtension;
            $fileTmpName = $file['tmp_name'];
            $rootDirectory = $_SERVER['DOCUMENT_ROOT'];
            $destination = $rootDirectory . "/uploads/" . $newFileName;

            // if(move_uploaded_file($fileTmpName, $destination)){
            //     echo "File uploaded successfully";
            // }else{
            //     echo "Failed to move the file";
            // }

            // die();

            if(move_uploaded_file($fileTmpName, $destination)){
                $uploads[] = $newFileName;
            }else{
                error_log("Failed to move the file: $fileName" );
            }
        }
        return $uploads;
      
    }


}




