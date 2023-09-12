<?php
function upload() {
    $uploadDir_img_logo = "images/";
    
    $file_tmp = isset($_FILES['img_logo']['tmp_name']) ? $_FILES['img_logo']['tmp_name'] : ""; 
    $file_name = isset($_FILES['img_logo']['name']) ? $_FILES['img_logo']['name'] : ""; 
    $file_type = isset($_FILES['img_logo']['type']) ? $_FILES['img_logo']['type'] : ""; 
    $file_size = isset($_FILES['img_logo']['size']) ? $_FILES['img_logo']['size'] : ""; 
    $file_error = isset($_FILES['img_logo']['error']) ? $_FILES['img_logo']['error'] : "";
    
    $dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s");
    $file__name__=$dmyhis.$file_name;
    copy ( $file_tmp, $uploadDir_img_logo.$file__name__);
    
    return $uploadDir_img_logo.$file__name__;
}
?>