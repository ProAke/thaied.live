<?php
/* connect to gmail 

 private $server = 'mail.thaied.live';
    private $user   = 'services@thaied.live';
    private $pass   = '!Jj392536789';
    private $port   = 143; // adjust according to server settings


*/
$mail = imap_open('{mail.thaied.live:110/pop3}', 'services@thaied.live', '!Jj392536789');
// grab a list of all the mail headers 

$headers = imap_headers($mail);




// grab a header object for the last message in the mailbox 

$last = imap_num_msg($mail);
$header = imap_header($mail, $last);

// grab the body for the same message 
$body = imap_body($mail, $last);

// close the connection 
imap_close($mail);
