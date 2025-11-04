<?php
function is_admin()
{
    $ci =& get_instance();
    $role = $ci->session->userdata('role');

    if ($role !== 'admin') {

        redirect('login/blocked');
        exit;
    }
}
