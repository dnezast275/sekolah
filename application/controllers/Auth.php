<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin/dashboard');
            } else {
                redirect('member/dashboard');
            }
        }

        //Properti judul
        $data['menu']   = 'Login';
        $data['judul']  = ' | dNezast';

        //Login validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            //Load view login
            $this->load->view('login/header.php', $data);
            $this->load->view('login/login.php');
            $this->load->view('login/footer.php');
        } else {
            $this->Auth_model->login();
        }
    }

    public function register()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin/dashboard');
            } else {
                redirect('member/dashboard');
            }
        }

        //Properti judul
        $data['menu']   = 'Daftar';
        $data['judul']  = ' | dNezast';

        //Form validation pendaftar
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username is already taken!'
        ]);
        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
            'min_length'    => 'Password is too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'matches'       => 'Password is not match!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique'    => 'This email is already registered!',
            'valid_email'  => 'Email must be a valid email!'
        ]);

        //Logic register condition
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Register Account | dNezast';

            //Load view register
            $this->load->view('login/header', $data);
            $this->load->view('register/index', $data);
            $this->load->view('login/footer');
        } else {

            //Eksekusi ke model
            $this->Auth_model->register();
            redirect('auth');
        }
    }

    public function verify()
    {
        $this->Auth_model->verify();
    }
}
