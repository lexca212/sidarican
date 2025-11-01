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

        // var_dump($data);
        // die(); // Debugging line to check data

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

        $data = array(
            'tujuan' => $tujuan,
            'km_awal' => $km_awal,
            'km_akhir' => $km_akhir,
            'tgl_perjalanan' => $tgl_perjalanan,
            'id_kendaraan' => $id_kendaraan
        );

        $insert = $this->db->insert('perjalanan', $data);

        if($insert) {
            echo"<script> 
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data Perjalanan berhasil disimpan',
                        showConfirmButton: false,
                        timer: 2000
                    });
                </script>";
        }

        redirect('perjalanan/data');
    }
}
?>