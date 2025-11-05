<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
        // if(!$this->session->userdata('logged_in')){
        //    echo "<script>alert('Silahkan Login');
        //     window.location.href='" . site_url('login') . "';
        //     </script>";
        // };
        check_sesi();
    }

    public function index()
    {
        $data['data'] = $this->M_dashboard->ambil_data();
        $data['title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);

        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form tambah data';
        $data['user'] = $this->session->userdata('nama');
        $data['bbm']  = $this->M_dashboard->databbm();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Dashboard/tambahdata', $data);
        $this->load->view('templates/footer');
    }
    

    public function simpan()
    {

        $gambar = $this->gambar();
        $id_kendaraan = $this->input->post('id_kendaraan');
        $nm_kendaraan = strtoupper($this->input->post('nm_kendaraan'));
        $merk_kendaraan = $this->input->post('merk_kendaraan');
        $nopol_kendaraan = $this->input->post('nopol_kendaraan');
        $kd_bbm = $this->input->post('bbm_kendaraan');
        $tahun_kendaraan = $this->input->post('tahun_kendaraan');

        if ($gambar)

        $data = [
            'nm_kendaraan' => $nm_kendaraan,
            'merk_kendaraan' => $merk_kendaraan,
            'nopol_kendaraan' => $nopol_kendaraan,
            'kd_bbm' => $kd_bbm,
            'tahun_kendaraan' => $tahun_kendaraan,
            'gambar_subsidi' => $gambar
        ];

        $exists = $this->db
            ->where('id_kendaraan', $id_kendaraan)
            ->get('data_kendaraan')
            ->num_rows() > 0;

        $success = $exists
            ? $this->db->where('id_kendaraan', $id_kendaraan)->update('data_kendaraan', $data)
            : $this->db->insert('data_kendaraan', $data);

        $this->session->set_flashdata('notif', [
            'type'    => $success ? 'success' : 'error',
            'message' => $success
                ? ($exists ? 'Data kendaraan berhasil diperbarui!' : 'Data kendaraan berhasil disimpan!')
                : ($exists ? 'Gagal memperbarui data kendaraan.' : 'Gagal menyimpan data kendaraan.')
        ]);

        redirect('dashboard');
    }

    private function gambar()
    {
        $config['upload_path']          = './uploads/kartu_subsidi';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10240;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $upload = $this->upload->data();

            return $upload['file_name'];
        } else {
            echo $this->upload->display_errors();
            return null;
        };

        // if ( ! $this->upload->do_upload('gambar'))
        // {
        //         echo $this->upload->display_errors();
        //         return NULL;
        // }
        // else
        // {
        //         $upload = $this->upload->data();
        //         return $upload['file_name'];

        //         // $this->load->view('upload_success', $data);
        //         // redirect('dashboard');
        // };
    }

    public function hapus($id)
    {
        $this->M_dashboard->hapus($id);
        $this->session->set_flashdata('notif', [
            'type' => 'success',
            'message' => 'Data kendaraan berhasil dihapus!'
        ]);

        redirect('dashboard');
    }

    public function edit($id) 
    {
        $data['kendaraan'] = $this->db->get_where('data_kendaraan', ['id_kendaraan' => $id])->row();
        $data['user'] = $this->session->userdata('nama');
        $data['bbm']  = $this->M_dashboard->databbm();
        $data['title'] = 'Edit Data Kendaraan';

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Dashboard/formEdit', $data);
        $this->load->view('templates/footer');
    }
}
