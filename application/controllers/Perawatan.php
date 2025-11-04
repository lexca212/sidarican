<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_perawatan');
        $this->load->model('M_dashboard');
        // $this->load->model('M_masterbbm');

        check_sesi();
    }

    public function index() 
    {
        $data['perawatan'] = $this->M_perawatan->ambil_data();
        $data['title'] = 'Data Perawatan Kendaraan';
        $data['user'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('perawatan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
      $data['kendaraan'] = $this->M_dashboard->ambil_data();
      $data['title'] = 'Tambah Data Perawatan';
      $data['user'] = $this->session->userdata('nama');

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('perawatan/formAdd', $data);
      $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $id_perawatan   = $this->input->post('id_perawatan');
        $id_kendaraan   = $this->input->post('id_kendaraan');
        $tgl_perawatan  = $this->input->post('tgl_perawatan');
        $biaya          = $this->input->post('biaya');
        $keterangan     = $this->input->post('keterangan');

        $data = [
            'id_kendaraan'  => $id_kendaraan,
            'tgl_perawatan' => $tgl_perawatan,
            'biaya'         => $biaya,
            'keterangan'    => $keterangan,
        ];

        $exists = $this->db
            ->where('id_perawatan', $id_perawatan)
            ->get('perawatan_kendaraan')
            ->num_rows() > 0;

        $success = $exists
            ? $this->db->where('id_perawatan', $id_perawatan)->update('perawatan_kendaraan', $data)
            : $this->db->insert('perawatan_kendaraan', $data);

        $this->session->set_flashdata('notif', [
            'type'    => $success ? 'success' : 'error',
            'message' => $success
                ? ($exists ? 'Data Perawatan berhasil diperbarui!' : 'Data Perawatan berhasil disimpan!')
                : ($exists ? 'Gagal memperbarui data perawatan.' : 'Gagal menyimpan data perawatan.')
        ]);

        redirect('perawatan');
    }


    public function hapus($id)
    {
        is_admin();
        $delete = $this->db->where('id_perawatan', $id)->delete('perawatan_kendaraan');

        if($delete) {
            $this->session->set_flashdata('notif', [
                'type' => 'success',
                'message' => 'Data perawatan berhasil dihapus!'
            ]);
        } else {
            $this->session->set_flashdata('notif', [
                'type' => 'error',
                'message' => 'Gagal menghapus data perawatan!'
            ]);
        }
        
        
        redirect('perawatan');
    
    }

    public function edit($id)
    {
        is_admin();
        $data['kendaraan'] = $this->M_dashboard->ambil_data();
        $data['perawatan'] = $this->db->get_where('perawatan_kendaraan', ['id_perawatan' => $id])->row();
        $data['title'] = 'Edit Data Perawatan';
        $data['user'] = $this->session->userdata('nama');

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('perawatan/formEdit', $data);
        $this->load->view('templates/footer');
    }
}
