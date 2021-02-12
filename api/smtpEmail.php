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
    $item->contact_name = $data->contact_name;
    $item->contact_email = $data->contact_email;
    $item->contact_question = $data->contact_question;
  
    
    if($item->sendEmailForm()){
        echo 'Email created successfully.';
    } else{
        echo 'Email could not be created.';
    }
?>