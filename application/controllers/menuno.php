<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menuno extends CI_Controller {
           function __construct()
              {
              	parent::__construct();
              	$this->load->helper('form');

              	$this->load->model('menu_model');
              }
              function index()
              {

              	                if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('menuno', $data);
   }
              	$this->load->view('registrado');
              

              }
                function logout()
 { 
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('blog/entradasno', 'refresh');
 }
            
              
          
   
   }

?>