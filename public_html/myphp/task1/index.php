<?php
session_start();
include ('config.php');
include ('libs/function.php');

$files =[];

if($_FILES){
    $data = $_FILES['data'];
    upload_files($data)?setFlash(SACCESS_DOWNLOAD_FILE): setFlash(SACCESS_DOWNLOAD_FILE,'fail') ;
}
else{
     setFlash(ERROR_SELECT,'fail');
}


if (requestPost('del_file')){

    $del_file = requestPost('del_file');
    if(delete_file($del_file))
        setFlash(SACCESS_DEL_FILE);
    else
        setFlash(ERROR_DEL_FILE,'fail'); 

}

$flashMessage = getFlash();

$flag = read_directory($files);
if(!$flag)  setFlash(DIR_NOT_FOUND,'fail');

include ('templates/index.php');
