<?php
if (!defined('BASEPATH'))
                exit('No direct script access allowed');

class Menu_model extends CI_Model
{
                
                function __construct()
                {
                                parent::__construct();
                                $this->load->database();
                                $this->load->library('bcrypt');
                                
                }
                function nuevaEntrada($data)
                {
                               
                               
                                $this->db->insert('entradas', $data);
                }
                
                function mostrarEntradas()
                {

                                $this->db->order_by('fecha ASC');
                                return $this->db->get('entradas');
                                
                                
                }
                function cambiar_datos($data)
                {
                     
                               $query = $this->db->get_where('usuarios', array('email' => $data['email']
                                ));
                              if (sizeof($query->result()) >= 1) {

                             
                                                $this->session->set_flashdata('correobad', '<div align="center" class="alert alert-danger">
                                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                      <strong>This email is already registered please try it with another email</strong>
                                                    </div>');
                                                redirect('blog/user_porfile', 'refresh');
                                }else{
                                $id_user = $data['id_user'];
                                $this->db->where('id_user', $id_user);
                                return $this->db->update('usuarios', array(
                                                
                                                'email' => $data['email'],
                                                
                                ));
                        }
                }
                     
                        function cambiar_pass($data)
                {
                                $pass     = $data['pass'];
                                $password = password_hash($pass, PASSWORD_BCRYPT);

                                $query = $this->db->get_where('usuarios', array('pass' => $password
                                                                ));

                                if (sizeof($query->result()) >= 1) {
                                $this->session->set_flashdata('passre', '<div align="center" class="alert alert-danger">
                                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                      <strong>Ya has usado esta contraseña prueba con otra</strong>
                                                    </div>');
                                                redirect('menu', 'refresh');
                                        
                                }else{
                                 $id_user = $data['id_user'];
                                $this->db->where('id_user', $id_user);
                                return $this->db->update('usuarios', array(
                                                
                                                'pass' => $password,
                                                
                                ));

                        }
                        
                }
                      function recuperar_pass($data)
                {
                                $pass     = $data['pass'];
                                $password = password_hash($pass, PASSWORD_BCRYPT);
                                $email = $data['email'];
                                $this->db->where('email', $email);
                                return $this->db->update('usuarios', array(
                                                
                                                'pass' => $password,
                                                
                                ));
                        
                }
                  

                function mostrarEntrada($id)
                {

        
                          
                                
                                
                             $this->db->set('visitas', 'visitas+1', FALSE);
                              $this->db->where('id', $id);
                                $this->db->update('entradas');
                                $this->db->where('id', $id);

                                $query = $this->db->get('entradas');
                                if ($query->num_rows() > 0)
                                                return $query;


                                else
                                                return false;

                }
                function post_by_user_user($id_autor)
                {
                                $this->db->where('id_autor', $id_autor);
                                $query = $this->db->get('entradas');
                                if ($query->num_rows() > 0)
                                                return $query;
                                else
                                                return false;
                }
                function post_by_user_users($id_autor)
                {
                                
                                $this->db->order_by('fecha DESC');
                                return $this->db->get('entradas');
                                ;
                }
                function nuevoComentario($data)
                {
                                
                                $this->db->insert('comentarios', $data);
                                
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
                function nuevousuario($data, $pass)
                {
                                /* $password = $pass['pass'];
                                $hash = $this->bcrypt->hash_password($password);
                                $passe = $hash;
                                */
                                $pass     = $pass['pass'];
                                $password = password_hash($pass, PASSWORD_BCRYPT);
                                
                                $query = $this->db->get_where('usuarios', array('email' => $data['email']
                                ));
                                 $query = $this->db->get_where('usuarios', array('username' => $data['username']
                                ));
                                if (sizeof($query->result()) >= 1) {

                                            
                                               $this->session->set_flashdata('correobad', '<div align="center" class="alert alert-danger">
                                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                      <strong>Ya hay un usuario registrado con estos datos intenta con otro</strong>
                                                    </div>');
                                                redirect('menu', 'refresh');
                                } else {
                                               
                                                
                                                
                                                $this->db->insert('usuarios', array(
                                                                'username' => $data['username'],
                                                                'pass' => $password,
                                                                'email' => $data['email']
                                                ));
                                }
                }
                function mostrarUsuarios($username)
                {
                                
                                $this->db->select('email')->where('username =', $username, 'and username <>', $username);
                                $pass  = $this->db->select('pass');
                                $query = $this->db->get('usuarios');
                                if ($query->num_rows() > 0) {
                                                return $query;
                                } else {
                                                return false;
                                }
                }

             
                
                
}


?>