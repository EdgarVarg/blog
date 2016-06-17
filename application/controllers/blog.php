 <?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();
class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('menu_model');

    }

    function inicio()
    {

        $this->load->view('menu');

        $this->load->view('header');
        $this->load->view('registrarse');
              
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('registrado', $data);
            
        } else {
            //If no session, redirect to login page
            redirect('menu', 'refresh');
        }
    }
    
    
    
    function nueva()
    {
        
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['id_user'] = $session_data['id_user'];
            $data['username'] = $session_data['username'];
            $dato['email'] = $session_data['email'];

            $this->load->view('entradas', $data);
        }
        
        $this->load->view('registrado');
        $this->load->view('nueva',$dato);
        
    }
    function entradas()
    {
        $data['segmento'] = $this->uri->segment(3);
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['email'] = $session_data['email'];
            $this->load->view('entradas', $data);
        }
        
        
        if (!$data['segmento']) {
            $this->session->userdata('logged_in');
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['email'] = $session_data['email'];
            $this->load->view('registrado');
            $data['entradas']    = $this->menu_model->mostrarEntradas();
            $dato['comentarios'] = $this->menu_model->mostrarComentarios();
            $this->load->view('contenido', $data);
        } else {
            $username['username'] = $session_data['username'];
            $this->load->view('registrado',$data);

            $data['entradas']    = $this->menu_model->mostrarEntrada($data['segmento']);
            $data['comentarios'] = $this->menu_model->mostrarComentario($data['segmento']);
            $data['usuarios'] = $this->menu_model->mostrarUsuarios($username['username']);
            $this->load->view('contenido', $data);
            $this->load->view('comentar', $data);
            $this->load->view('comentarios', $data);
    
        }
        
        
        
    }
    function entradasno()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('entradas', $data);
        }
        
        $data['segmento'] = $this->uri->segment(3);
        
        
        $this->load->view('header');
        if (!$data['segmento']) {
            $data['entradas']    = $this->menu_model->mostrarEntradas();
            $dato['comentarios'] = $this->menu_model->mostrarComentarios();
            $this->load->view('contenidono', $data);
        } else {
            $data['entradas']    = $this->menu_model->mostrarEntrada($data['segmento']);
            $data['comentarios'] = $this->menu_model->mostrarComentario($data['segmento']);
            $this->load->view('contenidono', $data);
            
            $this->load->view('comentarios', $data);
        }
        
        
        
    }
    
    function login()
    {
        $this->load->view('menu');
        $this->load->view('login');
    }
    
    
    function recibirdatos()
    {
       
        $data = array(
            'titulo' => $this->input->post('titulo',TRUE),
            'contenido' => $this->input->post('contenido',TRUE),
            'autor' => $this->input->post('autor',TRUE),
            'fecha' => date('Y-m-d H:i:s'),
            'email_autor' => $this->input->post('email'),
            'id_autor'=> $this->input->post('id_autor')
            
            
            
            
        );
        
        
        $this->menu_model->nuevaEntrada($data);
      
         $this->session->set_flashdata('correcto', '<div align="center" class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>La entrada se ah publicado correctamenre</strong>
            </div>');
                redirect('blog/entradas', 'refresh');
                 
    }
    function recibirusuario()
    {
        $data = array(
             
            'username' => $this->input->post('username',TRUE),
            'pass' => $this->input->post('pass'),
            'email' => $this->input->post('email',TRUE)
            
            
            
            
        );
        
        
       
        $this->menu_model->nuevousuario($data);
       
         $this->session->set_flashdata('registrado', '<div align="center" class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>El usuario se ah registrado correctamenre</strong></div>');
                redirect('verifylogin', 'refresh');
        
    }
    function recibirComentario()
    {
        
        
        $data = array(
            'comentario' => $this->input->post('comentario'),
            'id_entrada' => $this->input->post('id_entrada'),
            'email_comentario'=>$this->input->post('email_comentario'),
            'email_autor'=>$this->input->post('email_autor')
            
            
        );

        $dato = array(
            
            'autor' => $this->input->post('autor'),
            'titulo' => $this->input->post('titulo')
   
        );
        
        
        maile($dato['titulo'], $dato['autor'], $data['comentario'],$data['email_comentario'],$data['email_autor']);
        
        $this->menu_model->nuevoComentario($data);
        redirect(base_url() . 'index.php/blog/entradas/' . $data['id_entrada']);
        
        
        
        
    }
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('verifylogin', 'refresh');
    }
    
    
}
