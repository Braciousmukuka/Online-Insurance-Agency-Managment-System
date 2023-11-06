<?php 
    require_once('includes/load.php');
    
    
    if(isset($_POST['submit'])){
    $client  = $_POST['customer'];

    $sql3  = "INSERT INTO policy_sale (";
    $sql3 .= "client";
    $sql3 .= ") VALUES (";
    $sql3 .= "'{$client}'";
    $sql3 .= ")";
    }

    if($db->query($sql3)){
        redirect('sale_policy.php');
      }

      
?>