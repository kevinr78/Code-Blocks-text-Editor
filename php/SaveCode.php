<?php
   session_start();
   include('DBconnect.php');
   $response = json_decode($_POST['textareaValue']);
$success ="";

if($_SERVER['REQUEST_METHOD']=='POST'){

      $html =  $response->html;
      $css =  $response->css;
      $js =  $response->js;


      if(!empty($html)){
            $query ='UPDATE `users_details` SET 
            `html` = "'.$html.'"
                  WHERE `email` = "'.$_SESSION['email'].'" LIMIT 1';
                        
                  $result =mysqli_query($DBcon, $query);
                  if($query){
                       $success .= "Html Updated " ; 
                  }
            }
            if(!empty($css)){
                  $query ='UPDATE `users_details` SET 
                  `css` = "'.$css.'"
                        WHERE `email` = "'.$_SESSION['email'].'" LIMIT 1';
                              
                        $result =mysqli_query($DBcon, $query);
                        if($query){
                              $success .=" Css Updated " ; 
                        }
                }
                if(!empty($js)){
                  $query ='UPDATE `users_details` SET 
                  `javascript` = "'.$js.'"
                        WHERE `email` = "'. $_SESSION['email'].'" LIMIT 1';
                              
                        $result =mysqli_query($DBcon, $query);
                        if($query){
                              $success.=" JavaScript Updated " ; 
                        }
                }
            echo $success;
}
      
?>