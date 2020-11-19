<?php
   session_start();
 
   include('DBconnection.php');
   $response = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
      
      $html= mysqli_real_escape_string($connection, $_POST['html']);
     $css = mysqli_real_escape_string($connection, $_POST['css']);
     $js = mysqli_real_escape_string($connection, $_POST['js']);

    if(!empty($html)){
      
      $query ='UPDATE `users details` SET 
      `html` = "'.$html.'"
            WHERE `email` = "'.$_SESSION['email'].'" LIMIT 1';
      
            $result =mysqli_query($connection, $query);
            if($query){
                 $response .= "Html Updated " ; 
            }
    }
    if(!empty($css)){
      $query ='UPDATE `users details` SET 
      `css` = "'.$css.'"
            WHERE `email` = "'.$_SESSION['email'].'" LIMIT 1';
                  
            $result =mysqli_query($connection, $query);
            if($query){
                  $response .=" Css Updated " ; 
            }
    }
    if(!empty($js)){
      $query ='UPDATE `users details` SET 
      `javascript` = "'.$js.'"
            WHERE `email` = "'.$_SESSION['email'].'" LIMIT 1';
                  
            $result =mysqli_query($connection, $query);
            if($query){
                  $response.=" JavaScript Updated " ; 
            }
    }
    echo $response;

}


?>
