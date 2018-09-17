<?php 
header('Access-Control-Allow-Origin: *');
header('Content-type: Application/Json');

$REQUEST_METHOD         = $_SERVER['REQUEST_METHOD'];
$REQUEST_TIME           = $_SERVER['REQUEST_TIME'];
$REQUEST_URI            = $_SERVER['REQUEST_URI'];
$REQUEST_CONTENT_TYPE   = $_SERVER['REQUEST_CONTENT_TYPE'];


switch ($REQUEST_METHOD) {
    case "GET":
        getData($REQUEST_URI);
        break;
    case "POST":
        postData($REQUEST_URI);
        break;
    case "PUT":
        putData($REQUEST_URI);
        break;
    case "DELETE":
        deleteData($REQUEST_URI);
        break;
    default:
        echo('{"data":[{"id":"123","name":"Joe","profession":"Programmer","address":"555 Main St","REQUEST_METHOD":"'.$REQUEST_METHOD.'","REQUEST_TIME":"'.$REQUEST_TIME.'","REQUEST_URI":"'.$REQUEST_URI.'","REQUEST_CONTENT_TYPE":"'.$REQUEST_CONTENT_TYPE.'"}]}');

}
function getControllers(){
    $controllers = ['people','houses'];
    return $controllers;
}
function responseSuccess($msg,$status="200"){
    echo('{"response":"success","status":"'.$status.'","message":"'.$msg.'"}');
}
function responseError($msg="bad request",$status="400"){
    echo('{"response":"error","status":"'.$status.'","message":"'.$msg.'"}');
}


function uri_segements($REQUEST_URI){
    $args = explode("/",$REQUEST_URI);
    return $args;
}

function getData($REQUEST_URI){
    $args = uri_segements($REQUEST_URI);
    $controllers = getControllers();
     if(in_array($args[1],$controllers)){
        $data = '{data":['.json_encode($REQUEST_URI).']}';
        echo($data);
     }else{
         echo('{"request":"bad request"}');
     }
    
    
}

function postData($REQUEST_URI){
    $args = uri_segements($REQUEST_URI);
    $data = '{"REQUEST_URI":['.json_encode($REQUEST_URI).'],"data":['.json_encode($_POST).'],"controller":"'.$args[1].'","id":"'.$args[2].'"}';
    echo($data);
}

function putData($REQUEST_URI){
    $args = uri_segements($REQUEST_URI);
    $data = '{"REQUEST_URI":['.json_encode($REQUEST_URI).'],"data":['.json_encode($_REQUEST).'],"controller":"'.$args[1].'","id":"'.$args[2].'"}';
    echo($data);
}

function deleteData($REQUEST_URI){
    $args = uri_segements($REQUEST_URI);
    $data = '{"REQUEST_URI":['.json_encode($REQUEST_URI).'],"data":['.json_encode($_REQUEST).'],"controller":"'.$args[1].'","id":"'.$args[2].'"}';
    echo($data);
}

