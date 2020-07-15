<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function register()
    {

        $data = [
            'username'      => htmlspecialchars($this->input->post('username', true)),
            'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'nama'          => htmlspecialchars($this->input->post('nama', true)),
            'email'         => htmlspecialchars($this->input->post('email', true)),
            'gambar'        => 'default.png',
            'bio'           => '',
            'active'        => 0,
            'role_id'       => 1,
            'date_created'  => time()
        ];

        //Generate token aktivasi
        $token = base64_encode(random_bytes(32));
        $token_active = [
            'email'         => $this->input->post('email', true),
            'token'         => $token,
            'date_created'  => time()
        ];

        $this->db->insert('user', $data);
        $this->db->insert('user_token', $token_active);

        $this->_sendEmail($token, 'verify');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat! Akun anda telah dibuat. Silahkan cek email anda untuk aktivasi akun.
			<button class="close" type="button" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
        redirect('auth');
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protokol'    => 'smtp',
            'smtp_host'    => 'ssl://smtp.gmail.com',
            'smtp_user'    => 'muhamadramdani.tmkm@gmail.com',
            'smtp_pass'    => 'dnezast275',
            'smtp_port'    => 567,
            'mailtype'    => 'html',
            'charset'    => 'utf-8',
            'newline'    => "\r\n"
        ];

        //Load library email
        $this->load->library('email', $config);
        $this->email->set_mailtype('html');

        //Send email aktivasi

        //Sender
        $this->email->from('muhamadramdani.tmkm@gmail.com', 'dNezast');
        //Receiver
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {

            $this->email->subject('Account Verification');
            $this->email->message('Click this link to activate your account : ' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token));
        } else if ($type == 'forgot') {

            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : ' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token));
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < 86400) {
                    $this->db->set('active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $email . ' has been activated! Please login.
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
                    redirect('auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Account activation failed! Token expired!
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Account activation failed! Token invalid!
				<button class="close" type="button" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Account activation failed! Wrong email.
			<button class="close" type="button" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
            redirect('auth');
        }
    }

    public function login()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $user       = $this->db->get_where('user', ['username' => $username])->row_array();

        //User exist
        if ($user) {
            //User active
            if ($user['active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username'   => $user['username'],
                        'role_id'    => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('admin/dashboard');
                    } else {
                        redirect('member/dashboard');
                    }
                } else {
                    //Password wrong
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password salah!
					<button class="close" type="button" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
                    redirect('auth');
                }
            } else {
                //User doesn't active
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Akun belum aktif!
				<button class="close" type="button" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
                redirect('auth');
            }
        } else {
            //User doesn't exist
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username tidak terdaftar!
			<button class="close" type="button" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
            redirect('auth');
        }
    }
}
