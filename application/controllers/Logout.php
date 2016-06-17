 <?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();
class Logout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('menu_model');

    }
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('verifylogin', 'refresh');
    }

}