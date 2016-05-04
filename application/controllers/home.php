<?php  
  /**
  * 
  */
  class Home extends CI_Controller
  {
      
      public function index()
      {
        $data = array('title' => 'Home' );
            $this->load->view("/guest/head", $data);
            $data = array('app' =>  'Blog');    
            $this->load->view("/guest/nav",$data);
            $data = array('post' => 'Blog', 'descripcion' => 'Bienvenido a mi pagina web' );
      	     $this->load->view("/guest/header",$data);

          $this->load->model('post');
          $result = $this->post->getPost();
           $data  = array('consulta' => $result );
             $this->load->view("/guest/content",$data);
             $this->load->view("/guest/footer",$data);
            $this->load->view("home",$data);



      }



  

}

?>