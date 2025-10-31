<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function cek_login($username, $password)
    {
        return $this->db->get_where('user',
    [
        'username' => $username,
        'password' => md5($password)
    ]);

    }

}

/* End of file M_login.php */


?>