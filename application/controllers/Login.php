<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
        $this->load->view('pages/login', $data);
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function login_validation()
    {
        $this->rules();
        $captcha_response = trim($this->input->post('g-recaptcha-response'));


        if ($this->form_validation->run() == FALSE) {
            redirect(base_url("index.php/Login"));
        } else {
            $email = $this->input->post('email');
            $password = hash("sha256", ($this->input->post('password')));
            //$captcha = $this->input->post('captcha');
            $secret = '6Lfn7NkaAAAAANIOLTlETp_XHyHhnK8ZiFTBNSLe';

            $cek = $this->login_model->cek_login($email, $password);
            $check = array(
                'secret'        =>    $secret,
                'response'      =>    $this->input->post('g-recaptcha-response')
            );

            $startProcess = curl_init();

            curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($startProcess, CURLOPT_POST, true);
            curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
            curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

            $receiveData = curl_exec($startProcess);

            $finalResponse = json_decode($receiveData, true);

            if ($cek == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Email atau Password salah
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
                $data['style'] = $this->load->view('include/style', NULL, TRUE);
                $data['script'] = $this->load->view('include/script', NULL, TRUE);
                $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
                $this->load->view('pages/login', $data);
            } else if (!$finalResponse['success']) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Capthca Tidak Benar!
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
                $data['style'] = $this->load->view('include/style', NULL, TRUE);
                $data['script'] = $this->load->view('include/script', NULL, TRUE);
                $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
                $this->load->view('pages/login', $data);
            } else if ($captcha_response == '') {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Mohon isi capthca
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
                $data['style'] = $this->load->view('include/style', NULL, TRUE);
                $data['script'] = $this->load->view('include/script', NULL, TRUE);
                $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
                $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
                $this->load->view('pages/login', $data);
            } else {
                $this->session->set_userdata('user_id', $cek->user_id);
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('role_id', $cek->role_id);
                $this->session->set_userdata('nama', $cek->nama);

                switch ($cek->role_id) {
                    case 1:
                        redirect('user');
                        break;
                    case 2:
                        redirect('admin');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function rules()
    {
        $this->form_validation->set_rules('email', 'email', 'required', array('required' => 'Email Cant Be Empty !'));
        $this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Password Cant Be Empty !'));
        //$this->form_validation->set_rules('captcha', 'captcha', 'required', array('required' => 'Please Fill The Captcha !'));
    }

    public function logout()
    {
        session_destroy();
        redirect();
    }
}
