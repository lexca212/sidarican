<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_login');
        // if ($thsi->
        // $this->session->userdata('logged_in');
        // )
    }

    public function index() 
    {
        $this->load->view('welcome_message');
    }

    public function cek_login()
}?>