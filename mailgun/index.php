<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;


$mg = Mailgun::create('4799e462d148f48441802ec00fb0de31-a3c55839-f2d3d8b5'); // For US servers
$mg = Mailgun::create('4799e462d148f48441802ec00fb0de31-a3c55839-f2d3d8b5', 'https://api.mailgun.net/v3/mg.thaied.live'); // For EU servers

// Now, compose and send your message.
// $mg->messages()->send($domain, $params);
$mg->messages()->send('mg.thaied.live', [
  'from'    => 'Education Services <services@thaied.live>',
  'to'      => 'worapot <worapot@yahoo.com>',
  'subject' => 'Welcome Seminar 2564 in Thailand Comming Soon',
  'text'	=> 'Testing some Mailgun awesomness!'
]);




//echo $result;


?>