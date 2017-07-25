<?php
function requestPost($key, $default=null)
{
    return isset($_POST[$key])?$_POST[$key]:$default;
}

//function redirect($to)
//{
//    header('Location:'.${to});
//    exit();
//}

function setFlash($message,$default='success')
{
    $_SESSION[FLASH_KEY] = ['status' => $default, 'message' => $message];
}



function getFlash()
{
    if (!isset($_SESSION[FLASH_KEY])) {
        return null;
    }
    
    $flash= $_SESSION[FLASH_KEY];
    unset($_SESSION[FLASH_KEY]);
    
    return $flash;
}


function read_directory(&$to)
{
    $dir = opendir(DIR_PATH);
    if(!$dir)
        return false;
    else{
        while(($filename=readdir($dir))!==false){
            if(!is_dir($filename)) { 
                $filesize = get_filesize(DIR_PATH.$filename);
                $to[]=['filename'=>$filename, 'filesize'=>$filesize];
            }
        }
        closedir($dir);
       
        return  true;
    }
}

function  get_filesize($filename)
{
    $filesize = filesize($filename);
    // if > 1Kb
    if($filesize > 1024){
        $filesize = ($filesize/1024);
        // if > 1MB
        if($filesize > 1024){
            $filesize = ($filesize/1024);
            //if > 1GB
            if($filesize > 1024){
               $filesize = ($filesize/1024);
               $filesize = round($filesize, 1);
               return ['size'=>$filesize, 'units'=>'GB'];       
            }else{
               $filesize = round($filesize, 1);
               return ['size'=>$filesize, 'units'=>'MB'];    
            }       
        }else{
            $filesize = round($filesize, 1);
            return ['size'=>$filesize, 'units'=>'Kb'];    
        }  
    }else{
        $filesize = round($filesize, 1);
        return ['size'=>$filesize, 'units'=>'bites'];   
    }
}

//function if_file_exists($dir,$file){
//    $dir = opendir($dir);
//    if(!$dir)
//        return false;
//    else{
//        while(($filename=readdir($dir))!==false){
//            if(!is_dir($filename) && $filename==$file) return false;
//        }
//        closedir($dir);
//        return  true;
//    }
//}


function upload_files($data)
{
    $is_upload = false; 

        for($i=0, $count=count($data['tmp_name']); $i<$count; $i++){
            if(is_uploaded_file($data['tmp_name'][$i])){
                //if(if_file_exists($dir,$data['name'][$i])){
                if(!file_exists(DIR_PATH.$data['name'][$i])){  
                    $new_file_name = DIR_PATH.$data['name'][$i];
                    if(move_uploaded_file($data['tmp_name'][$i], $new_file_name)){  
                        $is_upload = true;
                    }
                }
            }
        }
    return $is_upload;  
}

function delete_file($del_file)
{
        $old = getcwd();
        if (!(@chdir(DIR_PATH))) return false;//Error open path
        @chmod( $del_file, 0666);
        if (!(@unlink($del_file))) return false;//Error Delete File
        chdir($old);
        return true;

}

  
