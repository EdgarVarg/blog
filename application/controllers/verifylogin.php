<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('User_model','',TRUE);
 }
 
 function index()
 {
  if ($this->session->userdata('logged_in')) {
    redirect('blog/entradas');
 
 }else{
    //This method will have the credentials validation

    $this->load->library('form_validation');
  $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_database');
   $this->form_validation->set_rules('pass', 'Pass', 'required');
 //  $this->form_validation->set_rules('email', 'Email', 'required');
   // $this->form_validation->set_rules('email', 'Email', 'valid_email');

  
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    $this->session->set_flashdata('vacio2',validation_errors());
     $this->load->view('header');
     $this->load->view('login_view');

   }
   else
   {
     //Go to private area
    $this->session->set_flashdata('bienvenido', '<div align="center" class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Bienvenido</strong>
            </div>');
     redirect('blog/entradas', 'refresh');
   }
 
 }
}
 
 function check_database($pass,$username)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $email = $this->input->post('email');
   $password = $this->input->post('pass');
   //query the database
   $result = $this->User_model->login($username,$password,$email,$pass);

   if ($username = null) {
     echo "Por favor ingrese un usuario";
   }
   
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
      if ($resultado = password_verify($password, $row->pass)){
         $sess_array = array(
         'id_user' => $row->id_user,
         'username' => $row->username,
         'email' => $row->email
       );
       $this->session->set_userdata('logged_in', $sess_array);
          return TRUE;
      }else{
        $this->form_validation->set_message('check_database', '<div align="center" class="alert alert-danger">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Invalid Password</strong>
            </div>');
        return FALSE;
      }     
     } 
   }
   else
   {
            $this->form_validation->set_message('check_database', '<div align="center" class="alert alert-danger">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Invalid Username</strong>
            </div>');
     return false;
   }
 }
}
?>