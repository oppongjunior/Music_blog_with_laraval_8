<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mailheader = "From:".$name."<".$email.">\r\n";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";

$recipient = "gidministry@gidcharityfoundation.org";

$result = mail($recipient,$subject,$body,$header);
if(!$result){
    echo json_encode(["error"=>true,"msg"=>"your message was't sent"]);
    return;
}
echo json_encode(["error"=>false,"msg"=>"your message was sent successfully"]);
?>