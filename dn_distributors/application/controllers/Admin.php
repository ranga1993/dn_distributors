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

//    public function updateCustomer(){
//        $this->load->view('Admin/update_customer');
//    }
//
//    public function removeCustomer(){
//        $this->load->view('Admin/remove_customer');
//    }
//
//    public function removeDp(){
//        $this->load->view('Admin/remove_delivery_person');
//    }

    public function removeProduct(){
        $this->load->view('Admin/remove_product');
    }

    public function add_delivery_person(){
        $this->load->view('Admin/add_delivery_person');
    }

//    public function update_delivery_person(){
//        $this->load->view('Admin/update_delivery_person');
//    }

    public function add_product(){
        $this->load->view('Admin/add_product');
    }

    public function update_product(){
        $this->load->view('Admin/update_product');
    }

    public function customer_registration(){
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
            $this->Admin_model->insert_customer_data();
            redirect('Admin');
        }
        else{
            echo 'Something Wrong';
        }
    }

    public function update_customer_details(){

//        $this->form_validation->set_rules('customer_name', 'customer_name', 'required');
//        $this->form_validation->set_rules('company_name', 'company_name', 'required');
//        $this->form_validation->set_rules('address', 'address', 'required');
//        $this->form_validation->set_rules('nic', 'nic', 'required|is_unique[customer.nic]');
//        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
//        $this->form_validation->set_rules('contact_number', 'contact_number', 'required|is_unique[customer.contact_number]');
//        $this->form_validation->set_rules('password', 'password', 'required');
//        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');

//        if($this->form_validation->run() != FALSE){
//            $this->load->model('Admin_model');
//            $this->Admin_model->update_customer($customer_id);
//            redirect('Admin');
//        }
//        else{
//            echo 'Something Wrong';
//        }
        $data=array(
            'customer_name'=>$this->input->post('customer_name'),
            'company_name'=>$this->input->post('company_name'),
            'address'=>$this->input->post('address'),
            'nic'=>$this->input->post('nic'),
            'email'=>$this->input->post('email'),
            'contact_number'=>$this->input->post('contact_number'));

        $this->load->model('Admin_model');
        $this->Admin_model->update_customer(array('customer_id'=>$this->input->post('customer_id')), $data);
        echo json_encode(array("status"=>TRUE));
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

    public function update_customer(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_customer_data();
        $this->load->view('Admin/update_customer', $data);
    }

    public function update_delivery_person(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_dp_data();
        $this->load->view('Admin/update_delivery_person', $data);
    }

    public function remove_customer(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_customer_data();
        $this->load->view('Admin/remove_customer', $data);
    }

    public function remove_dp(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_dp_data();
        $this->load->view('Admin/remove_delivery_person', $data);
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

        $data=array(
            'dp_name'=>$this->input->post('dp_name'),
            'address'=>$this->input->post('address'),
            'nic'=>$this->input->post('nic'),
            'email'=>$this->input->post('email'),
            'contact_number'=>$this->input->post('contact_number'));

        $this->load->model('Admin_model');
        $this->Admin_model->update_dp(array('dp_id'=>$this->input->post('dp_id')), $data);
        echo json_encode(array("status"=>TRUE));
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

    public function view_each_customer($customer_id){
        $this->load->model('Admin_model');
        $data = $this->Admin_model->get_each_customer($customer_id);
        echo json_encode($data);
    }

    public function remove_each_customer($customer_id){
        $this->load->model('Admin_model');
        $this->Admin_model->remove_customer($customer_id);
        echo json_encode(array("status" => TRUE));
    }

    public function update_each_customer($customer_id){
        $this->load->model('Admin_model');
        $this->Admin_model->update_customer($customer_id);
        echo json_encode(array("status" => TRUE));
    }

    public function view_each_pending_order($order_number){
        $this->load->model('Admin_model');
        $data = $this->Admin_model->get_each_pending_order($order_number);
        echo json_encode($data);
    }

    public function view_each_delivered_order($order_number){
        $this->load->model('Admin_model');
        $data = $this->Admin_model->get_each_delivered_order($order_number);
        echo json_encode($data);
    }

//    public function update_delivery_person($dp_id){
//        $this->load->model('Admin_model');
//        $this->Admin_model->update_delivery_person($dp_id);
//        echo json_encode(array("status" => TRUE));
//    }

    public function view_each_dp($dp_id){
        $this->load->model('Admin_model');
        $data = $this->Admin_model->get_each_dp($dp_id);
        echo json_encode($data);
    }

    public function remove_each_dp($dp_id){
        $this->load->model('Admin_model');
        $this->Admin_model->remove_dp($dp_id);
        echo json_encode(array("status" => TRUE));
    }

    public function search_customer(){
        $output = '';
        $query = '';
        $this->load->model('Admin_model');

        if($this->input->post('query')){
            $query = $this->input->post('query');
        }
        $data = $this->Admin_model->search_customer($query );
        $output .= '
            <div class="table-responsive">
                <table class="table table-stiped">
                    <tr>
                        <th>Customer Name</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>NIC</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                    </tr>
        ';

        if($data->num_rows() > 0){
            foreach($data->result() as $row){
                $output .= '
                    <tr>
                        <td>'.$row->customer_name.'</td>
                        <td>'.$row->company_name.'</td>
                        <td>'.$row->address.'</td>
                        <td>'.$row->nic.'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->contact_number.'</td>
                    </tr>
                ';
            }
        }
        $output .= '</table>';
        echo $output;
    }
}