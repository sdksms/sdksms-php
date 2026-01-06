<?php 
 // SMS One-to-One Sending Interface 
 
 $userName = 'lsgy'; // Account Username 
 $password = 'VWjFR'; // Account Password 
 $timestamp = time() * 1000; // Get current timestamp, precise to milliseconds 
 $messageList = [ // List of SMS content and phone numbers 
     [ 
         'phone' => '15011111111', 
         'content' => '[Signature] SMS Content 1' 
     ], 
     [ 
         'phone' => '15022222222', 
         'content' => '[Signature] SMS Content 2' 
     ] 
 ]; 
 
 // Calculate sign parameter value 
 $sign = md5($userName . $timestamp . md5($password)); 
 
 // Define request data 
 $data = [ 
     'userName' => $userName, 
     'messageList' => $messageList, 
     'timestamp' => $timestamp, 
     'sign' => $sign 
 ]; 
 
 // Define request options 
 $options = [ 
     'http' => [ 
         'header'  => "Content-Type: application/json;charset=utf-8\r\nAccept: application/json\r\n", 
         'method'  => 'POST', 
         'content' => json_encode($data) 
     ] 
 ]; 
 
 // Send HTTP request 
 $context  = stream_context_create($options); 
 $result = file_get_contents('https://sdksms.com/api/sendMessageOne', false, $context); 
 
 // Output response data 
 echo $result; 
?>
