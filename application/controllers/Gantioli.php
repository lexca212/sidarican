<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GantiOli extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_gantioli');
        $this->load->model('M_dashboard');
        // $this->load->model('M_masterbbm');

        check_sesi();
    }

    public function index() 
    {
        $data['ganti_oli'] = $this->M_gantioli->ambil_data();
        $data['title'] = 'Data Penggantian Oli Kendaraan';
        $data['user'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ganti_oli/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
      $data['kendaraan'] = $this->M_dashboard->ambil_data();
      $data['title'] = 'Tambah Data Penggantian Oli';
      $data['user'] = $this->session->userdata('nama');

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('ganti_oli/formAdd', $data);
      $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $id_ganti_oli   = $this->input->post('id_ganti_oli');
        $id_kendaraan   = $this->input->post('id_kendaraan');
        $tgl_ganti      = $this->input->post('tgl_ganti');
        $biaya          = $this->input->post('biaya');
        $keterangan     = $this->input->post('keterangan');

        $data = [
            'id_kendaraan'  => $id_kendaraan,
            'tgl_ganti' => $tgl_ganti,
            'biaya'         => $biaya,
            'keterangan'    => $keterangan,
        ];

        $exists = $this->db
            ->where('id_ganti_oli', $id_ganti_oli)
            ->get('ganti_oli')
            ->num_rows() > 0;

        $success = $exists
            ? $this->db->where('id_ganti_oli', $id_ganti_oli)->update('ganti_oli', $data)
            : $this->db->insert('ganti_oli', $data);

        $this->session->set_flashdata('notif', [
            'type'    => $success ? 'success' : 'error',
            'message' => $success
                ? ($exists ? 'Data penggantian oli berhasil diperbarui!' : 'Data penggantian oli berhasil disimpan!')
                : ($exists ? 'Gagal memperbarui data penggantian oli.' : 'Gagal menyimpan data penggantian oli.')
        ]);

        redirect('gantioli');
    }


    public function hapus($id)
    {
        is_admin();
        $delete = $this->db->where('id_ganti_oli', $id)->delete('ganti_oli');

        if($delete) {
            $this->session->set_flashdata('notif', [
                'type' => 'success',
                'message' => 'Data penggantian oli berhasil dihapus!'
            ]);
        } else {
            $this->session->set_flashdata('notif', [
                'type' => 'error',
                'message' => 'Gagal menghapus data penggantian oli!'
            ]);
        }
        
        
        redirect('gantioli');
    
    }

    public function edit($id)
    {
      $data['kendaraan'] = $this->M_dashboard->ambil_data();
      $data['gantioli'] = $this->db->get_where('ganti_oli', ['id_ganti_oli' => $id])->row();
      $data['title'] = 'Edit Data Penggantian Oli';
      $data['user'] = $this->session->userdata('nama');

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('ganti_oli/formEdit', $data);
      $this->load->view('templates/footer');
    }
}