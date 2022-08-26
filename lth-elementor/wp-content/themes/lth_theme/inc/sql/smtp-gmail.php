<?php

// add file smtp-gmail.php vào file functions.php

// Ghi chú: email phải bật xác minh 2 lớp

// if ( class_exists( 'ACF' ) ) {
    
//     // $email_name = $smtp['email_name'];
// } else {
//     $smtp_host = 'smtp.gmail.com';
//     $smtp_port = 465;
//     $email_shop = 'trhuan177@gmail.com';
//     $email_pass = 'iagzjtpflskmgijh';
//     // $email_name = 'LTH';
// }

$smtp = get_field('mail_smtp', 'option');

$smtp_host = $smtp['smtp_host'];
$smtp_port = $smtp['smtp_port'];
$email_shop = $smtp['email_shop'];
$email_pass = $smtp['email_pass'];

add_action( 'phpmailer_init', function( $phpmailer ) {
    if ( !is_object( $phpmailer ) )
    $phpmailer = (object) $phpmailer;
    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = $smtp_host;
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Port       = $smtp_port;
    $phpmailer->Username   = $email_shop;
    $phpmailer->Password   = $email_pass;
    $phpmailer->SMTPSecure = 'TLS';
    $phpmailer->From       = $email;
    // $phpmailer->FromName   = $email_name;
});