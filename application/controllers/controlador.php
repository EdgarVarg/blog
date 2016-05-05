 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controlador extends CI_Controller {
 
           	function __construct()
           	{
           		parent::__construct();
           		$this->load->helper('form');
           		$this->load->model('controlador_model');
           		
           	}
         function index()
         {
         	$this->load->library('menu',array('Inicio','Contacto','Cursos'));
         	$data['mi_menu'] = $this->menu->construirMenu();
         	$this->load->view('controlador/headers');
         	$this->load->view('controlador/bienvenido',$data);
         }
         function holaMundo()
         {
         $this->load->view('controlador/headers');
         $this->load->view('controlador/bienvenido');
         }
          function nuevo()
         {
         $this->load->view('controlador/headers');
         $this->load->view('controlador/formulario');
         }
         function recibirDatos()
         {
         	$data = array(
         		'nombre' => $this->input->post('nombre'),
         		'videos' => $this->input->post('videos') 
         		);
         	$this->controlador_model->crearCurso($data);
         	  $this->load->view('controlador/headers');
         $this->load->view('controlador/bienvenido');
         }
          

 }






 ?>