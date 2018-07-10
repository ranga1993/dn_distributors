<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_person extends CI_Controller{
    public function index(){
        $this->load->view('DP/delivery_person');
    }

    public function register_customer(){
        $this->load->view('DP/register_customer');
    }

    public function customer_registration(){
        $this->form_validation->set_rules('cus_name', 'cus_name', 'required');
        $this->form_validation->set_rules('cus_company_name', 'cus_company_name', 'required');
        $this->form_validation->set_rules('cus_company_address', 'cus_company_address', 'required');
        $this->form_validation->set_rules('cus_nic', 'cus_nic', 'required|is_unique[customer.cus_nic]|is_unique[user.user_nic]');
        $this->form_validation->set_rules('cus_email', 'cus_email', 'required|valid_email|is_unique[customer.cus_email]|is_unique[user.user_email]');
        $this->form_validation->set_rules('cus_phone', 'cus_phone', 'required|is_unique[customer.cus_phone]');
        $this->form_validation->set_rules('cus_company_phone', 'cus_company_phone', 'required|is_unique[customer.cus_company_phone]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Dp_model');
            $this->Dp_model->insert_customer_data();
            redirect('Delivery_person');
        }
        else{
            echo 'Something Wrong';
        }
    }

    public function view_customer(){
        $this->load->model('Dp_model');
        $data['h'] = $this->Dp_model->get_customer_data();
        $this->load->view('DP/view_customer', $data);
    }

    public function view_each_customer($cus_id){
        $this->load->model('Dp_model');
        $data = $this->Dp_model->get_each_customer($cus_id);
        echo json_encode($data);
    }
}