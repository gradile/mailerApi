<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-dataed-With");
    include_once './model/formfields.php';

    $item = new FormFields();

    $data = json_decode(file_get_contents("php://input"));

    $item->subject = $data->subject;
    $item->contact_name = $data->contact_name;
    $item->contact_email = $data->contact_email;
    $item->contact_question = $data->contact_question;
  
   // $item->sendEmailForm();
    if($item->sendEmailForm()){
        echo  json_encode('Email created successfully.');
    } else{
        echo json_encode('Email could not be created.');
    }
?>