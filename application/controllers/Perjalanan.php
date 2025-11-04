<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perjalanan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_perjalanan');
        $this->load->model('M_dashboard');

        check_sesi();
    }

    public function data()
    {
        $data['data'] = $this->M_perjalanan->ambil_data_dengan_kendaraan();
        $data['title'] = 'Data Perjalanan';
        $data['user'] = $this->session->userdata('nama');

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('perjalanan/index', $data);
        $this->load->view('templates/footer'); 
        
    }

    public function tambah()
    {
        $data['kendaraan'] = $this->M_dashboard->ambil_data();
        $data['title'] = 'Tambah Data Perjalanan';
        $data['user'] = $this->session->userdata('nama');

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('perjalanan/formAdd', $data);
        $this->load->view('templates/footer');
    }

    public function get_km_akhir()
    {
        $id_kendaraan = $this->input->post('id_kendaraan');

        $km_akhir = $this->M_perjalanan->get_km_akhir_terakhir($id_kendaraan);

        if($km_akhir){
            echo json_encode(['status' => 'success', 'km_akhir' => $km_akhir]);
        } else {
            echo json_encode(['status' => 'empty', 'km_akhir' => 0]);
        }
    }


    public function simpan()
    {
        $tujuan = $this->input->post('tujuan');
        $km_awal = $this->input->post('km_awal');
        $km_akhir = $this->input->post('km_akhir');
        $tgl_perjalanan = $this->input->post('tgl_perjalanan');
        $id_kendaraan = $this->input->post('id_kendaraan');
        $id_user = $data['user'] = $this->session->userdata('id_user');

        $data = array(
            'tujuan' => $tujuan,
            'km_awal' => $km_awal,
            'km_akhir' => $km_akhir,
            'tgl_perjalanan' => $tgl_perjalanan,
            'id_kendaraan' => $id_kendaraan,
            'id_user' => $id_user
        );

        $insert = $this->db->insert('perjalanan', $data);

        if ($insert) {
            $this->session->set_flashdata('notif', [
                'type' => 'success',
                'message' => 'Data perjalanan berhasil disimpan!'
            ]);
        } else {
            $this->session->set_flashdata('notif', [
                'type' => 'error',
                'message' => 'Gagal menyimpan data perjalanan.'
            ]);
        }

        redirect('perjalanan/data');
    }

    public function detail($id) 
    {
        // $data['perjalanan'] = $this->M_perjalanan->get_detail_perjalanan($id);
        $data['perjalanan'] = $this->db->get_where('perjalanan', ['id_perjalanan' => $id])->row();

        $id_user = $data['perjalanan']->id_user;
        $data['pengguna'] = $this->db->get_where('user', ['id_user' => $id_user])->row();

        $id_kendaraan = $data['perjalanan']->id_kendaraan;
        $data['kendaraan'] = $this->db->get_where('data_kendaraan', ['id_kendaraan' => $id_kendaraan])->row();

        $data['title'] = 'Data Detail Perjalanan';
        $data['user'] = $this->session->userdata('nama');




        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('perjalanan/detail', $data);
        $this->load->view('templates/footer'); 
    }
}
?>