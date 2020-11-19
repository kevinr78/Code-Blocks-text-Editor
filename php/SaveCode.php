<?php
   session_start();
   include('DBconnection.php');
   $response = json_decode($_POST['textareaValue']);
       $success ="";

if($_SERVER['REQUEST_METHOD']=='POST'){

      $html =  $response->html;
      $css =  $response->css;
      $js =  $response->js;

      if(!empty($html)){
            $query ='UPDATE `users details` SET 
            `html` = "'.$html.'"
                  WHERE `id` = "'.$_SESSION['email'].'" LIMIT 1';
                        
                  $result =mysqli_query($connection, $query);
                  if($query){
                       $success .= "Html Updated " ; 
                  }
            }
            if(!empty($css)){
                  $query ='UPDATE `users details` SET 
                  `css` = "'.$css.'"
                        WHERE id = "'.$_SESSION['email'].'" LIMIT 1';
                              
                        $result =mysqli_query($connection, $query);
                        if($query){
                              $success .=" Css Updated " ; 
                        }
                }
                if(!empty($js)){
                  $query ='UPDATE `users details` SET 
                  `javascript` = "'.$js.'"
                        WHERE id = "'. $_SESSION['email'].'" LIMIT 1';
                              
                        $result =mysqli_query($connection, $query);
                        if($query){
                              $success.=" JavaScript Updated " ; 
                        }
                }
            echo $success;
}
      
?>
