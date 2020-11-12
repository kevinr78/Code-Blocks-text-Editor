<?php
   session_start();
   include('DBconnection.php');
   $response = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
      
      $html= mysqli_real_escape_string($connection, $_POST['html']);
     $css = mysqli_real_escape_string($connection, $_POST['css']);
     $js = mysqli_real_escape_string($connection, $_POST['js']);

    if(!empty($html)){
      /* updateData("html" ,$html, $connection); */
      $query ='UPDATE `users details` SET 
      `html` = "'.$html.'"
            WHERE id = "'.mysqli_real_escape_string($connection, $_SESSION['id']).'" LIMIT 1';
                  
            $result =mysqli_query($connection, $query);
            if($query){
                 $response .= "Html Updated" ; 
            }
    }
    if(!empty($css)){
      $query ='UPDATE `users details` SET 
      `css` = "'.$css.'"
            WHERE id = "'.mysqli_real_escape_string($connection, $_SESSION['id']).'" LIMIT 1';
                  
            $result =mysqli_query($connection, $query);
            if($query){
                  $response .="Css Updated" ; 
            }
    }
    if(!empty($js)){
      $query ='UPDATE `users details` SET 
      `javascript` = "'.$js.'"
            WHERE id = "'.mysqli_real_escape_string($connection, $_SESSION['id']).'" LIMIT 1';
                  
            $result =mysqli_query($connection, $query);
            if($query){
                  $response.="JavaScript Updated" ; 
            }
    }
    echo $response;

}


?>
