<?php
    session_start();
    require('./../util/functions.php');
    require_once ('./../util/hashing.php');
    $utility = new Utility();
    $namefile = array();
    for($i=0; $i<2; $i++) {
     $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
      if ($tmpFilePath != ""){
      $file[$i] = $newFilePath = "./../../uploads/" . time().$_FILES['upload']['name'][$i];
        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
            array_push($namefile, $file[$i]);
        }else{
            $_SESSION['message'] = "Error Uploading Files";
            $_SESSION['messagetype'] ="alert alert-danger";
            $utility->redirect('./../../main/identification.php'); 
        }
      }
    }

    $auth = new Auth();
    $values = array('gov_id'=>$namefile[0], 'POA'=>$namefile[1]);
    $where = "_id = ". $_SESSION['user_id'];
    if($auth->update('customers', $values, $where) == true){
        $_SESSION['message'] = "Files Successfully Updated";
        $_SESSION['messagetype'] ="alert alert-success";
        $utility->redirect('./../../main/identification.php');
    }else{
        $_SESSION['message'] = "Error Updateing Files";
        $_SESSION['messagetype'] ="alert alert-danger";
        $utility->redirect('./../../main/identification.php'); 
    }
?>