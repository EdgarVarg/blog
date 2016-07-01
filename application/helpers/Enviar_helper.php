<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require 'application/vendor/autoload.php';
use Mailgun\Mailgun;
function maile($subject, $autor, $text, $email_comentario,$email_autor)
{
    
    try{
    # Instantiate the client.
    $mgClient = new Mailgun('key-6e1864e0bbbf6e20133372ec5d0e8787');
    $domain   = "sandbox41165099550640ebad5da087fb66be92.mailgun.org";
    
    # Make the call to the client.
    $result = $mgClient->sendMessage($domain, array(
        'from' =>$email_comentario,
        'to' => $email_autor,
        'subject' => 'Titulo de la entrada:' . ' ' . $subject,
        'text' => 'Autor:' . ' ' . $autor . ' 
    ' . 'Comentario:' . $text
        
        
    ));
}
catch(Exception $e){
echo '{"error":{"text":'. $e->getMessage() .'}}';
}

}
