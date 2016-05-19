<?php Class User extends CI_Model
{
 function login($username, $pass)
 {
   $this -> db -> select('id, username, pass');
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