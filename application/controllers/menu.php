<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
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
                redirect('blog/entradas');
              
                
                }else{
                $this->load->view('menu');
                $this->load->view('header');
                $this->load->view('registrarse');

                }
              }
            
              
          
   
   }

?>