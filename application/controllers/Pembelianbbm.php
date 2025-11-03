<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelianbbm extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_pembelianbbm');
        $this->load->model('M_dashboard');
        $this->load->model('M_masterbbm');

        check_sesi();
    }

    public function index() 
    {
        $data['pembelianbbm'] = $this->M_pembelianbbm->ambil_data_pembelian_bbm();
        $data['title'] = 'Data Pemebelian BBM';
        $data['user'] = $this->session->userdata('nama');
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bbm/data', $data);
        $this->load->view('templates/footer');
        
        
        
    }

    public function tambah()
    {
        $data['kendaraan'] = $this->M_dashboard->ambil_data();
        $data['bbm'] = $this->M_masterbbm->ambildata();
        $data['title'] = 'Tambah Data Pembelian BBM';
        $data['user'] = $this->session->userdata('nama');

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bbm/formAdd', $data);
        $this->load->view('templates/footer');
    }

    public function get_harga_bbm()
    {
        $jenis_bbm = $this->input->post('jenis_bbm');

        $harga_bbm = $this->M_masterbbm->get_harga($jenis_bbm);

        if($jenis_bbm){
            echo json_encode(['status' => 'success', 'harga_bbm' => $harga_bbm]);
        } else {
            echo json_encode(['status' => 'empty', 'harga_bbm' => 0]);
        }
    }

    public function simpan()
    {
        $id_kendaraan = $this->input->post('id_kendaraan');
        $tanggal_beli = $this->input->post('tanggal_beli');
        $kd_bbm = $this->input->post('jenis_bbm');
        $harga_bbm = $this->input->post('harga_bbm');
        $jml_liter_bbm = $this->input->post('jml_liter_bbm');
        $jml_harga_bbm = $this->input->post('jml_harga_bbm');

        $data = array(
            'id_kendaraan' => $id_kendaraan,
            'tanggal_beli' => $tanggal_beli,
            'kd_bbm' => $kd_bbm,
            'harga_bbm' => $harga_bbm,
            'jml_liter_bbm' => $jml_liter_bbm,
            'jml_harga_bbm' => $jml_harga_bbm
        );

        $insert = $this->db->insert('pembelian_bbm', $data);

        if ($insert) {
            $this->session->set_flashdata('notif', [
                'type' => 'success',
                'message' => 'Data pembelian BBM berhasil disimpan!'
            ]);
        } else {
            $this->session->set_flashdata('notif', [
                'type' => 'error',
                'message' => 'Gagal menyimpan data pembelian BBM.'
            ]);
        }

        redirect('pembelianbbm');
    }

    public function laporan(){
        $data['title']  = 'Laporan Bulanan Pembelian BBM';
        $data['user']   =  $this->session->userdata('nama');
        $data['kendaraan'] = $this->M_pembelianbbm->data_kendaraan();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bbm/filter', $data);
        $this->load->view('templates/footer');
        
        
    }

    public function filter()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir  = $this->input->post('tgl_akhir');
        $kendaraan  = $this->input->post('nm_kendaraan');

        // $join =
        $this->db->select('pembelian_bbm.*, data_kendaraan.*');
        $this->db->from('pembelian_bbm');
        $this->db->join('data_kendaraan', 'pembelian_bbm.id_kendaraan=data_kendaraan.id_kendaraan');
        $this->db->where('pembelian_bbm.tanggal_beli >=', $tgl_awal);
        $this->db->where('pembelian_bbm.tanggal_beli <=', $tgl_akhir);
        $this->db->where('pembelian_bbm.id_kendaraan', $kendaraan);
        $query = $this->db->get();


        //$query = $this->db->where(['tanggal_beli >=' => $tgl_awal, 'tanggal_beli <=' => $tgl_akhir, 'id_kendaraan' => $kendaraan]);
        //$hasilquery = $query->get('pembelian_bbm')->row();

        $jumlah = $this->db->select_sum('jml_harga_bbm')->where(['tanggal_beli >=' => $tgl_awal, 'tanggal_beli <=' => $tgl_akhir, 'id_kendaraan' => $kendaraan])->get('pembelian_bbm');
        //$total = $hasilquery->jml_harga_bbm * $jumlah;
        $cek = $this->db->get_where('laporan_transaksi', [
            'bulan' => $this->nama_bulan($tgl_awal)
        ]);

        
        if(!$cek->num_rows() > 0){
            $insert = [
                'tgl_awal' => $tgl_awal,
                'tgl_akhir' => $tgl_akhir,
                'bulan' => $this->nama_bulan($tgl_awal),
                'id_kendaraan' => $kendaraan,
                'total' => $jumlah->row()->jml_harga_bbm
            ];

             $this->db->insert('laporan_transaksi', $insert);
        }else{
            redirect('pembelianbbm');
        }

        
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['bulan']  = $this->nama_bulan($tgl_akhir);
        $data['hasil'] = $query->result();
        $data['total'] = $jumlah->row()->jml_harga_bbm;

        $this->load->view('templates/header');
        $this->load->view('bbm/hasil', $data, FALSE);
        //$this->load->view('templates/footer');
        
        


    }

    private function nama_bulan($tanggal)
    {
        $bulan = [
            '1' => 'JANUARI',
            '2' => 'FEBRUARI',
            '3' => 'MARET',
            '4' => 'APRIL',
            '5' => 'MEI',
            '6' => 'JUNI',
            '7' => 'JULI',
            '8' => 'AGUSTUS',
            '9' => 'SEPTEMBER',
            '10' => 'OKTOBER',
            '11' => 'NOVEMBER',
            '12' => 'DESEMBER'
        ];

        $pisah = explode('-', $tanggal);
        $namabulan = $pisah[1];

        return $bulan[$namabulan];
    }
}