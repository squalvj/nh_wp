<?php 
    $field = get_fields();
    $to = $field['email'];
    $from = $_POST['email'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $msg = $_POST['msg'];
    var_dump(sendEmail($to, cut($msg, 5), $msg)); 



?>