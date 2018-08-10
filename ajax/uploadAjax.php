<?php

include_once "../controllers/controller.php";
include_once "../models/crud.php";

if (isset($_FILES["file"])) {
    if (!empty($_FILES["file"])) {
        if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
            $targetDir = "../download/";
            $imageFileSize=$_FILES["file"]["size"];
            $imageFileType=pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

            $imageName2 = time()."_".rand(1000,9999).".".$imageFileType;

            $targetFile2 = $targetDir . $imageName2;

            if ($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != png
            && $imageFileType != "PNG") {
                $return = "1";
            }
            else if ($imageFileSize > 25165824) {
                $return = "2";
            }
            else {
                move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile2);
                $controller = new Controller;
                $controller->guardarArchivoController($imageName2, "download/".$imageName2."");
                return;
            }
        }
        else {
            $return = "3";
        }
    }
    else {
        $return = "4";
    }
}
else{
    $return = "4";
}

echo $return;

?>