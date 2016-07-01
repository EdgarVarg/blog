<?php Class User_model extends CI_Model
{
 function login($username, $pass,$email,$foto)
 {
   $this->db-> select('id_user, username, pass, email');
   $this->db-> from('usuarios');
   $this->db-> where('username', $username);
  // $this->db-> where('email', $email);
   
   $pass = $this->db->select('pass');

 
   $query = $this->db->get();
 
   if($query->num_rows() == 1)
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