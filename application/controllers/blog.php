 
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

    function index()
    {

        $this->load->view('menu');
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
            $data['username'] = $session_data['username'];
            $this->load->view('entradas', $data);
        }
        $this->load->view('registrado');
        $this->load->view('nueva');
        
    }
    function entradas()
    {
        $data['segmento'] = $this->uri->segment(3);
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('entradas', $data);
        }
        
        
        if (!$data['segmento']) {
            $this->load->view('registrado');
            $data['entradas']    = $this->menu_model->mostrarEntradas();
            $dato['comentarios'] = $this->menu_model->mostrarComentarios();
            $this->load->view('contenido', $data);
        } else {
            
            $this->load->view('id');
            $data['entradas']    = $this->menu_model->mostrarEntrada($data['segmento']);
            $data['comentarios'] = $this->menu_model->mostrarComentario($data['segmento']);
            $this->load->view('contenido', $data);
            $this->load->view('comentar', $data);
            $this->load->view('comentarios', $data);
            $this->load->view('recibe');
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
            'titulo' => $this->input->post('titulo'),
            'contenido' => $this->input->post('contenido'),
            'autor' => $this->input->post('autor'),
            'fecha' => date('Y-m-d H:i:s')
            
            
            
            
        );
        
    }
    function recibirusuario()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'pass' => $this->input->post('pass')
            
            
            
            
        );
        
        
        
        $this->menu_model->nuevousuario($data);
       
        header('Location: http://localhost/blog/index.php/verifylogin');
        
    }
    function recibirComentario()
    {
        
        
        $data = array(
            'comentario' => $this->input->post('comentario'),
            'id_entrada' => $this->input->post('id_entrada'),
            'autor' => $this->input->post('autor'),
            'titulo' => $this->input->post('titulo')
            
            
        );
        
        maile($data['titulo'], $data['autor'], $data['comentario']);
        
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

?>