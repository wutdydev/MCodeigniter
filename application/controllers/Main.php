<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main extends MY_Controller {

	public function index()
	{
		$this->load->view('ex1_sample');
    }
    

    /*public function Login() {
        $this->load->model('Model_sample');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'required'); //ใช้อ้างอิงตัวเดียวพอ
        
        //$header = array('title' => 'Login', 'name' => 'login', 'id' => 'login' , 'method' => 'POST' ,'action' => $this->User_check->eiei());

        if ($this->form_validation->run() == FALSE) {

            $header = array('title' => 'Login');
            $this->load->view('template/header', $header);
            $this->load->view('Login');
            $this->load->view('template/footer');
        } else {
            $this->load->library('Lib_member');
            $this->lib_member->check_count_login();
        }

    }

    public function Logout() {
        $this->session->sess_destroy();
        redirect('Salev', 'refresh');
    }*/
}
