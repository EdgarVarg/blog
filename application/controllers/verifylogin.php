<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function nuevaEntrada($data)
    {
        $this->db->insert('entradas', array(
            'titulo' => $data['titulo'],
            'contenido' => $data['contenido'],
            'autor' => $data['autor'],
            'fecha' => $data['fecha']
        ));
    }
    
    function mostrarEntradas()
    {
        $query = $this->db->get('entradas');
        if ($query->num_rows() > 0)
            return $query;
        else
            return false;
    }
    function mostrarEntrada($id)
    {
        
        $this->db->where('id', $id);
        $query = $this->db->get('entradas');
        if ($query->num_rows() > 0)
            return $query;
        else
            return false;
    }
    function nuevoComentario($dato)
    {
        
        $this->db->insert('comentarios', array(
            'id_entrada' => $dato['id_entrada'],
            'comentario' => $dato['comentario']
        ));
        
    }
    function mostrarComentarios()
    {
        
        $query = $this->db->get('comentarios');
        if ($query->num_rows() > 0)
            return $query;
        else
            return false;
    }
    function mostrarComentario($id_entrada)
    {
        $this->db->where('id_entrada', $id_entrada);
        $query = $this->db->get('comentarios');
        if ($query->num_rows() > 0)
            return $query;
        else
            return false;
    }
    function nuevousuario($dato)
    {
        
        $this->db->insert('usuarios', array(
            'username' => $dato['username'],
            'password' => $dato['password']
        ));
        
    }
}


?>