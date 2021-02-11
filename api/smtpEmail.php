<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once './model/formfields.php';

    $item = new FormFields();

    $data = json_decode(file_get_contents("php://input"));

    $item->subject = $data->subject;
    $item->name = $data->name;
    $item->email = $data->email;
    $item->query = $data->query;
  
    
    if($item->sendEmailForm()){
        echo 'Email to Customer created successfully.';
    } else{
        echo 'Email to Customer could not be created.';
    }
?>