<?php
$receiver = "priyanshumishra971@gmail.com";
$subject = "OTP Verification";
$code = rand(999999, 111111);
$body = "Hi, there...The otp for login is $code";
$sender = "From:Two factor authentication";

if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>