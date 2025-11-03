<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        // if ($thsi->
        // $this->session->userdata('logged_in');
        // )
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('login');
        
    }


    public function cek_login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->M_login->cek_login($username, $password);
        $login = $cek->num_rows();

        if ($login > 0) {
            $user = $cek->row();
            $this->session->set_userdata([
                'id_user' => $user->id_user,
                'username' => $user->username,
                'nama' => $user->nama,
                'logged_in' => true

            ]);

            redirect('dashboard');
        } else {
            echo "<script>alert('login gagal!');
            window.location.href='" . site_url('login') . "';
            </script>";
        };
    }

    public function buatuser()
    {

        $data['title'] = 'judul';
        $data['user']   = 'hanya admin';
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('buatuser');
        $this->load->view('templates/footer');

        
    }

    public function simpanuser(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = [
            'nama' => $nama,
            'username' => $username,
            'password' => md5($password)
        ];

        $this->M_login->simpanuser($data);

        echo "<script>alert('Berhasi;');
            window.location.href='" . site_url('dashboard') . "';
            </script>";
    }
}
?>