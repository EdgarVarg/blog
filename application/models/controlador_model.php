  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controlador_model extends CI_Model {
		
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		function crearCurso($data)
		{
		$this->db->insert('curso',  array('nombreCurso' => $data['nombre'],'videosCurso' => $data['videos'] ));
		}
	
}

?>