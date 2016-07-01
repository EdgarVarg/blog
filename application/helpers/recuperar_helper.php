<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require 'application/vendor/autoload.php';
use Mailgun\Mailgun;
function recovery($email_user,$pass)
{
    
    try{
    # Instantiate the client.
    $mgClient = new Mailgun('key-6e1864e0bbbf6e20133372ec5d0e8787');
    $domain   = "sandbox41165099550640ebad5da087fb66be92.mailgun.org";
    
    # Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
        'from' =>'edgarshadowwolf@gmail.com',
        'to' => $email_user,
        'subject' => 'Su contraseña es:',
        'text' =>$pass
        
        
    ));
}
catch(Exception $e){
echo '{"error":{"text":'. $e->getMessage() .'}}';
}

}
