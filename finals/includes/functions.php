<?php

function uploadOne($filename, $newname, $upload_directory) {
    // Ensure file is uploaded
    if (is_uploaded_file($filename['tmp_name'])) {
        $uploadfile = $upload_directory.$newname.".".end(explode(".", $filename['name']));
        if (move_uploaded_file($filename['tmp_name'],$uploadfile)) {
            $res = "File uploaded successfully!";
        } else {
            $res ="Error uploading file.";
        }
    }
    return $res;
}


function cleanText($str){
    $strClean=trim($str);
    $strClean=htmlspecialchars($strClean);
    return $strClean;
}
?>