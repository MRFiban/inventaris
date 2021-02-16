<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
        $this->load->helper('url');
        $this->load->library('session', 'database');
    }

    public function index()
    {
        if ($this->session->userdata('status') == "logged_in") {
            redirect(base_url('inventory/inventory'));
        }
        $data['title'] = 'Login';
        $this->load->view('templates/head', $data);
        $this->load->view('templates/navbar');
        $this->load->view('inventory/login');
        $this->load->view('templates/foot');
    }

    function auth_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $query = $this->inventory_model->auth_login("users", $where);
        $userinfo = $query->row();
        $cek = $query->num_rows();
        if (
            $cek > 0
        ) {
            $data_session = array(
                'real_name' => $userinfo->real_name,
                'role' => $userinfo->role,
                'status' => "logged_in"
            );
            $this->session->set_userdata($data_session);
            redirect(base_url("inventory/inventory"));
        } else {
            echo "Username dan password salah !";
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
