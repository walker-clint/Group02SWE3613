<?php
include_once "connect_to_mysql.php";
 
 $term=$_GET["term"];
 
 $query=mysql_query("SELECT * FROM tbl_song where title like '%".$term."%' order by name ");
 $json=array();
 
    while($student=mysql_fetch_array($query)){
         $json[]=array(
                    'value'=> $student["name"],
                    'label'=>$student["name"]." - ".$student["id"]
                        );
    }
 
 echo json_encode($json);
 
?>