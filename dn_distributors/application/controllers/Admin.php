<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function index()
    {
        $this->load->view('Admin/admin');
    }

    public function add_customer(){
        $this->load->view('Admin/add_customer');
    }

    public function update_customer(){
        $this->load->view('Admin/update_customer');
    }

    public function removeCustomer(){
        $this->load->view('Admin/remove_customer');
    }

    public function removeDp(){
        $this->load->view('Admin/remove_delivery_person');
    }

    public function removeProduct(){
        $this->load->view('Admin/remove_product');
    }

    public function add_delivery_person(){
        $this->load->view('Admin/add_delivery_person');
    }

    public function update_delivery_person(){
        $this->load->view('Admin/update_delivery_person');
    }

    public function add_product(){
        $this->load->view('Admin/add_product');
    }

    public function update_product(){
        $this->load->view('Admin/update_product');
    }

    public function dp_registration(){
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('nic', 'nic', 'required|is_unique[delivery_person.nic]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('contact_number', 'contact_number', 'required|is_unique[delivery_person.contact_number]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');

        if($this->form_validation->run() != FALSE){
            $this->load->model('user_model');
            $this->user_model->insert_user_data();
            redirect('Home');
        }
        else{
            echo 'Something Wrong';
        }
    }

    public function update_customer_details(){

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('nic', 'nic', 'required|is_unique[customer.nic]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('contact_number', 'contact_number', 'required|is_unique[customer.contact_number]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->update_customer_data();
            redirect('Admin');
        }
        else{
            echo 'Something Wrong';
        }
    }

    public function view_customer(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_customer_data();
        $this->load->view('Admin/view_customers', $data);
    }

    public function view_delivery_person(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_dp_data();
        $this->load->view('Admin/view_delivery_persons', $data);
    }

    public function view_pending_orders(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_pending_orders();
        $this->load->view('Admin/pending_orders', $data);
    }

    public function view_delivered_orders(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_delivered_orders();
        $this->load->view('Admin/delivered_orders', $data);
    }

    public function view_products(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_product_details();
        $this->load->view('Admin/view_products', $data);
    }

    public function remove_customer(){
        $this->form_validation->set_rules('name', 'name', 'required');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->remove_customer();
            redirect('Admin');
        }
    }

    public function remove_delivery_person(){
        $this->form_validation->set_rules('name', 'name', 'required');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->remove_dp();
            redirect('Admin');
        }
    }

    public function remove_product(){
        $this->form_validation->set_rules('product_code', 'product_code', 'required|is_unique[product.product_code]');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->remove_product();
            redirect('Admin');
        }
    }

    public function add_delivery_person_details(){

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('nic', 'nic', 'required|is_unique[delivery_person.nic]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('contact_number', 'contact_number', 'required|is_unique[delivery_person.contact_number]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->insert_dp_data();
            redirect('Admin');
        }
        else{
            echo 'Something Wrong';
        }
    }

    public function update_dp_details(){

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('nic', 'nic', 'required|is_unique[delivery_person.nic]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('contact_number', 'contact_number', 'required|is_unique[delivery_person.contact_number]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->update_dp_data();
            redirect('Admin');
        }
        else{
            echo 'Something Wrong';
        }
    }

    public function add_product_details(){

        $this->form_validation->set_rules('product_code', 'product_code', 'required|is_unique[product.product_code]');
        $this->form_validation->set_rules('product_name', 'product_name', 'required|is_unique[product.product_name]');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->add_product();
            redirect('Admin');
        }
        else{
            echo 'Something Wrong';
        }
    }

    public function update_product_details(){

        $this->form_validation->set_rules('product_code', 'product_code', 'required|is_unique[product.product_code]');
        $this->form_validation->set_rules('product_name', 'product_name', 'required|is_unique[product.product_name]');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->update_product();
            redirect('Admin');
        }
        else{
            echo 'Something Wrong';
        }
    }
}