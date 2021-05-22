<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
        $this->load->view('pages/login', $data);
    }

    public function login_validation()
    {
        $this->rules();
        $captcha_response = trim($this->input->post('g-recaptcha-response'));


        if ($this->form_validation->run() == FALSE) {
            redirect('login');
        } else {
            $email = $this->input->post('email');
            $password = hash("sha256", ($this->input->post('password')));
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

            if (!$finalResponse['success']) {
                $this->session->set_flashdata('pesan', 'Capthca Tidak Benar!');
            } else if ($captcha_response == '') {
                $this->session->set_flashdata('pesan', 'Mohon isi capthca');
            } else if ($cek == FALSE) {
                $this->session->set_flashdata('pesan', 'Email atau Password salah');
            }

            if (isset($_SESSION['pesan'])) {
                redirect('login');
            } else {
                $this->session->set_userdata('user_id', $cek->user_id);
                $this->session->set_userdata('email', $cek->email);
                $this->session->set_userdata('role_id', $cek->role_id);
                $this->session->set_userdata('name', $cek->name);
                $this->session->set_userdata('phone', $cek->phone);
                switch ($cek->role_id) {
                    case 1:
                        redirect('welcome');
                        break;
                    case 2:
                        redirect('admin');
                        break;
                    default:
                        redirect();
                        break;
                }
            }
        }
    }

    public function rules()
    {
        $this->form_validation->set_rules('email', 'email', 'required', array('required' => 'Email Cant Be Empty !'));
        $this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Password Cant Be Empty !'));
    }

    public function logout()
    {
        session_destroy();
        redirect();
    }
}
