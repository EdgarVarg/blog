 <?php 
 /**
  * 
  */
  class Blog extends Controller
  {
  	
  	function blog()
  	{
       parent::Controller();

       $this->load->scaffolding('entradas');
  	}
  	function index()
  	{
  		$data['titulo']= "Mi Blog";
  		$data['heading']= "Mi cabecera del blog";
  		$data['todo']= array('clean house','eat lunch','call mom', 'info');

  		$this->load->view('blog_view', '$data');
  	}
  } 

  ?>