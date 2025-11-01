<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('check_sesi')) {
    function check_sesi() {
        // Ambil instance CI agar bisa akses session, redirect, dsb
        $CI =& get_instance();

        // Cek apakah user sudah login (misal disimpan di session 'user_id')
        if (!$CI->session->userdata('logged_in')) {
            // Belum login → arahkan ke halaman login
            redirect('login');
            exit;
        }

        // // Contoh tambahan: jika ingin cek waktu mulai sesi
        // // Misalnya kamu punya session 'sesi_mulai'
        // $sesi_mulai = $CI->session->userdata('sesi_mulai');
        // if (empty($sesi_mulai)) {
        //     // Belum mulai sesi → logout atau redirect ke login
        //     redirect('login');
        //     exit;
        // }

        // Kalau semua valid → lanjut
        return true;
    }
}
