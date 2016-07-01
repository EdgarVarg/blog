 <?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('menu_model');
        $this->load->library('bcrypt');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }
    function index($entrada = null)
    {
        $data['segmento'] = $entrada;
        if ($this->session->userdata('logged_in')) {
            redirect('blog/entradas');
        } else {
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
    }
    function nueva()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['id_user']  = $session_data['id_user'];
            $data['username'] = $session_data['username'];
            $dato['email']    = $session_data['email'];
            $this->load->view('entradas', $data);
            $this->load->view('header');
            $this->load->view('nueva', $dato);
        } else {
            $this->session->set_flashdata('restringir', '<div align="center" class="alert alert-danger">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>No tienes permiso para acceder a esto! Ø </strong>
            </div>');
            redirect('blog/entradasno');
        }
    }
    function entradas($entrada = null)
    {
        $data['segmento'] = $entrada;
        //$data['segmento'] = $this->uri->segment(3);
        if ($entrada == null) {
            $this->load->view('entradas', $data);
        }
        if (preg_match("/^[a-z]+$/", $data['segmento'])) {
            echo "<script> alert('la pagina no existe');</script>";
            redirect('errors/error_404');
        }
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['email']    = $session_data['email'];
            $this->load->view('entradas', $data);
        } else {
            echo "no has iniciado sesion";
            redirect('blog/entradasno', $aviso);
            echo "<script> alert('por favor inicia session');</script>";
        }
        if (!$data['segmento']) {
            $this->session->userdata('logged_in');
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['email']    = $session_data['email'];
            $this->load->view('header');
            $data['entradas']    = $this->menu_model->mostrarEntradas($data['segmento']);
            $dato['comentarios'] = $this->menu_model->mostrarComentarios();
            $this->load->view('contenido', $data);
        } else {
            $archivo = "contador.txt";
            $contador = 0;

            $fp = fopen($archivo,"r");
            $contador = fgets($fp, 26);
            fclose($fp);

            ++$contador;

            $fp = fopen($archivo,"w+");
            fwrite($fp, $contador, 26);
            fclose($fp);

   
            $username['username'] = $session_data['username'];
            $this->load->view('header');
            $data['entradas']    = $this->menu_model->mostrarEntrada($data['segmento']);
            $data['comentarios'] = $this->menu_model->mostrarComentario($data['segmento']);
            $data['usuarios']    = $this->menu_model->mostrarUsuarios($username['username']);
            $this->session->set_flashdata('contador',$contador);
            $this->load->view('contenido', $data,$contador);
            $this->load->view('comentar', $data);
            $this->load->view('comentarios', $data);
        }
    }
    function entradasno($entrada = null)
    {
        $data['segmento'] = $entrada;
        if (preg_match("/^[a-z]+$/", $data['segmento'])) {
            echo "<script> alert('la pagina no existe');</script>";
            redirect('errors/error_404');
        }
        if ($this->session->userdata('logged_in')) {
            redirect('blog/entradas');
        }
        $data['segmento'] = $entrada;
        if ($entradas = null) {
            $this->load->view('contenidono', $data);
        }
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
        if ($this->session->userdata('logged_in')) {
            $this->form_validation->set_rules('titulo', 'Titulo');
            $this->form_validation->set_rules('contenido', 'Contenido', 'required');
            $this->form_validation->set_rules('autor', 'Autor', 'required');
            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('vacia', '<div align="center" class="alert alert-danger">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Favor de ingresar datos en los campos de su nueva entrada</strong>
            </div>');
                redirect('Blog/nueva', 'refresh');
            } else {
                $data = array(
                    'titulo' => htmlentities($this->input->post('titulo')),
                    'contenido' => htmlentities($this->input->post('contenido')),
                    'autor' => $this->input->post('autor', TRUE),
                    'fecha' => date('l dS \of F Y h:i:s A'),
                    'email_autor' => $this->input->post('email'),
                    'id_autor' => $this->input->post('id_autor')
                );
                $this->menu_model->nuevaEntrada($data, FILTER_SANITIZE_STRING);
                $this->session->set_flashdata('correcto', '<div align="center" class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>La entrada se ah publicado correctamenre</strong>
            </div>');
                redirect('blog/entradas', 'refresh');
            }
        } else {
            redirect('blog/entradasno');
        }
    }
    function recibirusuario()
    {
        $this->form_validation->set_rules('username', 'Nombre de usuario', 'required|trim|alpha_numeric','callback_chek');
          
        //$this->form_validation->set_rules('username','Username','required|trim|alpha_numeric|callback_chek');

        $this->form_validation->set_rules('email', 'Correo electronico', 'required','min_length[5]');
        $this->form_validation->set_rules('email', 'Correo electronico','required|valid_email|min_length[10]');
        $this->form_validation->set_rules('pass', 'Contraseña','required|min_length[5]|matches[pass_confirm]');
        $this->form_validation->set_rules('pass_confirm', 'Confirmar contraseña', 'required');
                $this->form_validation->set_message('chek', 'usuario invalido plox');   
        if ($this->form_validation->run() === FALSE) {

            $errors = validation_errors();

          $this->session->set_flashdata('vacio','<div align="center" class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>'.validation_errors().'</strong></div>');
          redirect('menu', 'refresh');
           
                        
            
           
        } else {
            $dataa = array(
                'username' => htmlentities($this->input->post('username', TRUE)),
                'email' => htmlentities($this->input->post('email', TRUE))
            );
            $pass  = array(
                'pass' => $this->input->post('pass'),
                'pass_confirm' => $this->input->post('pass_confirm')
            );
            $data  = array_unique($dataa);
            $this->menu_model->nuevousuario($data, $pass);
            $this->session->set_flashdata('registrado', '<div align="center" class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>El usuario se ah registrado correctamenre</strong></div>');
            redirect('verifylogin', 'refresh');
        }
    }
    
    function recibirComentario()
    {
        $this->form_validation->set_rules('comentario', 'Comentario', 'required', 'html_escape');
        if ($this->form_validation->run() === FALSE) {
            $check = array(
                'id_entrada' => $this->input->post('id_entrada', TRUE)
            );
            $this->session->set_flashdata('cvacio', '<div align="center" class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Comentario vacio</strong>
                </div>');
            redirect(base_url() . 'index.php/blog/entradas/' . $check['id_entrada']);
        } else {
            if ($this->session->userdata('logged_in')) {
                $data = array(
                    'comentario' => $this->input->post('comentario'),
                    'id_entrada' => $this->input->post('id_entrada', TRUE),
                    'email_comentario' => $this->input->post('email_comentario'),
                    'email_autor' => $this->input->post('email_autor')
                );
                $dato = array(
                    'autor' => $this->input->post('autor'),
                    'titulo' => $this->input->post('titulo')
                );
                maile($dato['titulo'], $dato['autor'], $data['comentario'], $data['email_comentario'], $data['email_autor']);
                $this->menu_model->nuevoComentario($data);
                redirect(base_url() . 'index.php/blog/entradas/' . $data['id_entrada']);
            } else {
                redirect('blog/entradasno');
            }
        }
    }
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('blog/entradasno', 'refresh');
    }
    function user_porfile()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['id_user']  = $session_data['id_user'];
            $data['username'] = $session_data['username'];
            $data['email']    = $session_data['email'];
            $this->load->view('header', $data);
            $this->load->view('perfil', $data);
            $this->load->view('cambiar_pass', $data);
        } else {
            redirect('verifylogin');
        }
    }
    function user_porfile_pass()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['id_user']  = $session_data['id_user'];
            $data['username'] = $session_data['username'];
            $data['email']    = $session_data['email'];
           
            $dataa['email']    = $act['email'];
            $this->load->view('header', $data);
            $this->load->view('cambiar_pass', $data);

        } else {
            redirect('verifylogin');
        }
    }
    function cambiar_datos()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|valid_email');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('fail', '<div align="center" class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Correo no valido</strong>
                </div>');
            redirect('blog/user_porfile');
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email', true)

            );
            
   

            $this->menu_model->cambiar_datos($data);
            $this->session->set_flashdata('good', '<div align="center" class="alert alert-success">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Se realizaron los cambios correctamente </strong>
                </div>');
                  
                 
            $this->session->set_userdata('logged_in', $data);
            redirect('blog/user_porfile', 'refresh');
        }
    }
    function cambiar_pass()

    {

        $this->form_validation->set_rules('pass', 'pass', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('pass', 'pass', 'required|trim|min_length[5]|matches[pass_confirm]');
        $this->form_validation->set_rules('pass_confirm', 'pass_confirm', 'trim');
        if ($this->form_validation->run() === FALSE) {
            $this->form_validation->set_message('pass', 'mensajepersonalizado');
            $this->session->set_flashdata('failp', '<div align="center" class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Las contraseñas no coinciden o son demaciado cortas </strong>
                </div>');
            redirect('blog/user_porfile');
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'pass' => $this->input->post('pass'),
                'pass_confirm' => $this->input->post('pass_confirm')
            );
            $this->session->set_flashdata('goodp', '<div align="center" class="alert alert-success">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Se realizaron los cambios correctamente cierra sesion para confirmar los cambios </strong>
                </div>');
            $this->menu_model->cambiar_pass($data);

            redirect('blog/user_porfile', 'refresh');
        }
    }
    function post_by_user($entrada = null)
    {
        $data['segmento'] = $entrada;
        //$data['segmento'] = $this->uri->segment(3);
        if ($entrada == null) {
            $this->load->view('entradas', $data);
        }
        if (preg_match("/^[a-z]+$/", $data['segmento'])) {
            echo "<script> alert('la pagina no existe');</script>";
            redirect('errors/error_404');
        }
        if ($this->session->userdata('logged_in')) {
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['email']    = $session_data['email'];
            $this->load->view('entradas', $data);
        } else {
            echo "no has iniciado sesion";
            redirect('blog/entradasno', $aviso);
            echo "<script> alert('por favor inicia session');</script>";
        }
        if (!$data['segmento']) {
            $this->session->userdata('logged_in');
            $session_data     = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['email']    = $session_data['email'];
            $this->load->view('header');
            $data['entradas'] = $this->menu_model->post_by_user_users($data['segmento']);
            $this->load->view('contenido', $data);
        } else {
            $username['username'] = $session_data['username'];
            $this->load->view('header');
            $data['entradas']    = $this->menu_model->post_by_user_user($data['segmento']);
            $data['comentarios'] = $this->menu_model->mostrarComentario($data['segmento']);
            $data['usuarios']    = $this->menu_model->mostrarUsuarios($username['username']);
            $this->load->view('contenido', $data);
        }
    }
    function post_by_userno($entrada = null)
    {
        $data['segmento'] = $entrada;
        if (preg_match("/^[a-z]+$/", $data['segmento'])) {
            echo "<script> alert('la pagina no existe');</script>";
            redirect('errors/error_404');
        }
        if (isset($entrada)) {
            echo "<script> alert('la pagina no existe');</script>";
            redirect('errors/error_404');
        }
        if ($this->session->userdata('logged_in')) {
            redirect('blog/entradas');
        }
        $data['segmento'] = $entrada;
        if ($entradas = null) {
            $this->load->view('contenidono', $data);
        }
        $this->load->view('header');
        if (!$data['segmento']) {
            $data['entradas'] = $this->menu_model->mostrarEntradas();
            $data['entradas'] = $this->menu_model->post_by_user_users($data['segmento']);
            $this->load->view('contenidono', $data);
        } else {
            $data['entradas']    = $this->menu_model->mostrarEntrada($data['segmento']);
            $data['entradas']    = $this->menu_model->post_by_user_user($data['segmento']);
            $data['comentarios'] = $this->menu_model->mostrarComentario($data['segmento']);
            $this->load->view('contenidono', $data);
        }
    }

    function recuperar_pass_view(){

        $this->load->view('header');
      $this->load->view('recuperar_pass');   

    }
        function recuperar_pass()
    {
         $this->form_validation->set_rules('pass', 'pass', 'required');
        $this->form_validation->set_rules('pass', 'pass', 'required', 'trim|min_length[5]|matches[pass_confirm]');
        $this->form_validation->set_rules('pass_confirm', 'pass_confirm', 'trim');
        if ($this->form_validation->run() === FALSE) {
            $this->form_validation->set_message('pass', 'mensajepersonalizado');
            $this->session->set_flashdata('failrec', '<div align="center" class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Las contraseñas no coinciden o son demaciado cortas </strong>
                </div>');
            redirect('blog/user_porfile');
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'pass' => $this->input->post('pass'),
                'pass_confirm' => $this->input->post('pass_confirm')
            );

            recovery($data['email'],$data['pass']);
            $this->session->set_flashdata('recover', '<div align="center" class="alert alert-success">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Se realizaron los cambios correctamente cierra sesion para confirmar los cambios </strong>
                </div>');
            $this->menu_model->recuperar_pass($data);
            redirect('verifylogin', 'refresh');
        } 

    }
}
