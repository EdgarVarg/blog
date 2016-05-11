<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {
    function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    }
    function nuevaEntrada($data)
    {
    	$this->db->insert('entradas', array('titulo'=>$data['titulo'],'contenido' =>$data['contenido'],'autor' =>$data['autor'],
    		'fecha' =>$data['fecha'],$data['autor']));
    }

    function mostrarEntradas()
    {
    	$query= $this->db->get('entradas');
    	if($query->num_rows() > 0) return $query;
    	else return false;
    }
      function nuevoComentario($dato)
    {
    	$this->db->insert('comentarios', array('comentario'=>$dato['comentario']));
    }
     function mostrarComentarios()
    {
    	$query= $this->db->get('comentarios');
    	if($query->num_rows() > 0) return $query;
    	else return false;
    }
}
?>