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
        $this->db->insert('entradas',$data
        );
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
    function nuevoComentario($data)
    {
        
        $this->db->insert('comentarios',$data);
        
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
    function nuevousuario($data)
    {
         $query = $this->db->get_where('usuarios', array('username' => $data['username']));
            if ($query->num_rows() > 0) {
                echo'<script>alert("el usuario ya esta registrado")</script>';
                redirect('menu', 'refresh');
            } else {
       echo'<script>alert("!Gracias por resgistrarte!")/script>';           

                
        $this->db->insert('usuarios', $data);
        }
    }
            function mostrarUsuarios($username)
        {
            
            $this->db->select('email')->where('username =',$username,'and username <>',$username);
            $query = $this->db->get('usuarios');
            if ($query->num_rows() > 0){
                return $query;
            }
            else{
                return false;
            }
        }


}


?>