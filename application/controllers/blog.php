 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {
       function __construct()
              {
              	parent::__construct();
              	$this->load->helper('form');
              	$this->load->model('menu_model');
              }

               function nueva()
           {
           	 $this->load->view('header');
           	 $this->load->view('nueva');

           } 
            function entradas()
           {
           $data['entradas'] = $this->menu_model->mostrarEntradas();
           $dato['comentarios'] = $this->menu_model->mostrarComentarios();
            	$this->load->view('header');
            	$this->load->view('contenido',$data);
            	$this->load->view('comentar',$dato);
            	$this->load->view('comentarios',$dato);

           } 

           function recibirdatos()
           {
           	$data = array(
           		'titulo' => $this->input->post('titulo'),
           		'contenido' => $this->input->post('contenido'),
           		'autor' => $this->input->post('autor'),
                'fecha' => date('Y-m-d H:i:s')


            

           	 );

           $this->menu_model->nuevaEntrada($data);
           header('Location: http://localhost/blog/index.php/blog/entradas');

           }
            function recibirComentario()
           {
           	$data = array(
           		'comentario' => $this->input->post('comentario')


            

           	 );

           $this->menu_model->nuevoComentario($data);
           header('Location: http://localhost/blog/index.php/blog/entradas');

           }
         
}
?>