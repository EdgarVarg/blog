<?php Class User_model extends CI_Model
{
 function login($username, $pass,$email)
 {
   $this -> db -> select('id_user, username, pass, email');
   $this -> db -> from('usuarios');
   $this -> db -> where('username', $username);
   $this -> db -> where('pass', ($pass));

   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>