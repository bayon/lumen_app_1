<?php 


function get($id){
    $data = array("getting"=>$id);
    return(json_encode($data));
    
}

function getAll(){
     
    $data = array("getting","all");
    return(json_encode($data));
}

function insert(){
    return('insert a record');
}

function update($id){
    return('update id ='.$id);
}

function delete($id){
    return('delete id ='.$id);
}