<?php

 include('headers.php');
 include('../db/airports-class.php');

$db = new SQLite3('../db/store.db');
$airports = new Airports($db);

// TODO Check 
 $_SERVER['REQUEST_METHOD'];



switch( $_SERVER['REQUEST_METHOD']){
    
    case "GET":
        $all_airports = $airports->read();

        http_response_code(200);
        echo json_encode($all_airports);
        break;

    case "POST":
        $data = json_decode(file_get_contents("php://input"));
        $airports->create($data);

        $all_airports = $airports->read();
        echo json_encode($all_airports);
        break;

    case "PUT":
        $data = json_decode(file_get_contents("php://input"));
        $airports->update($data);

        $all_airports = $airports->read();
        echo json_encode($all_airports);
        break;

    case "DELETE":
        $data = json_decode(file_get_contents("php://input"));
        $airports->delete($data);

        $all_airports = $airports->read();
        echo json_encode($all_airports);
        break;
    default:
        echo 'NEIN';
        break;

}