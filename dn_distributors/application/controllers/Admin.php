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

//    public function removeProduct(){
//        $this->load->view('Admin/remove_product');
//    }

    public function add_delivery_person(){
        $this->load->view('Admin/add_delivery_person');
    }

//    public function update_delivery_person(){
//        $this->load->view('Admin/update_delivery_person');
//    }

    public function add_product(){
        $this->load->view('Admin/add_product');
    }

    public function vehicle_stock(){
        $this->load->view('Admin/add_vehicle_stock');
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
            'cus_name'=>$this->input->post('cus_name'),
            'cus_company_name'=>$this->input->post('cus_company_name'),
            'cus_company_address'=>$this->input->post('cus_company_address'),
            'cus_nic'=>$this->input->post('cus_nic'),
            'cus_email'=>$this->input->post('cus_email'),
            'cus_phone'=>$this->input->post('cus_phone'),
            'cus_company_phone'=>$this->input->post('cus_company_phone'));

        $this->load->model('Admin_model');
        $this->Admin_model->update_customer(array('cus_id'=>$this->input->post('cus_id')), $data);
        echo json_encode(array("status"=>TRUE));
    }

    public function update_product_details(){

//        $this->form_validation->set_rules('product_code', 'product_code', 'required|is_unique[product.product_code]');
//        $this->form_validation->set_rules('product_name', 'product_name', 'required|is_unique[product.product_name]');
//        $this->form_validation->set_rules('type', 'type', 'required');
//        $this->form_validation->set_rules('description', 'description', 'required');
//        $this->form_validation->set_rules('image', 'image', 'required');
//        $this->form_validation->set_rules('price', 'price', 'required');
//
//        if($this->form_validation->run() != FALSE){
//            $this->load->model('Admin_model');
//            $this->Admin_model->update_product();
//            redirect('Admin');
//        }
//        else{
//            echo 'Something Wrong';
//        }
        $data=array(
            'product_name'=>$this->input->post('product_name'),
            'product_type'=>$this->input->post('product_type'),
            'product_description'=>$this->input->post('product_description'),
            'product_image'=>$this->input->post('product_image'),
            'product_price'=>$this->input->post('product_price'));

        $this->load->model('Admin_model');
        $this->Admin_model->update_product(array('product_id'=>$this->input->post('product_id')), $data);
        echo json_encode(array("status"=>TRUE));
    }

    public function add_vehicle_stock(){
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('product_name', 'product_name', 'required');
        $this->form_validation->set_rules('added_quantity', 'added_quantity', 'required');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->insert_vehicle_stock();
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

    public function view_vehicle_stock(){
        $this->load->model('Admin_model');
        $data1['h'] = $this->Admin_model->get_vehicle_stock();
        $data2['k'] = $this->Admin_model->get_order_data();
        $data3['l'] = $this->Admin_model->get_order_product_data();
        print_r($data1.date);

        if(($data2.order_status == 2)){

        }
        $this->load->view('Admin/view_vehicle_stock', $data1);
    }

    public function view_main_stock(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_main_stock();
        $this->load->view('Admin/view_main_stock', $data);
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

    public function update_product(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_product_details();
        $this->load->view('Admin/update_product', $data);
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

    public function remove_product(){
        $this->load->model('Admin_model');
        $data['h'] = $this->Admin_model->get_product_details();
        $this->load->view('Admin/remove_product', $data);
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


    public function add_delivery_person_details(){

        $this->form_validation->set_rules('dp_name', 'dp_name', 'required');
        $this->form_validation->set_rules('dp_address', 'dp_address', 'required');
        $this->form_validation->set_rules('dp_nic', 'dp_nic', 'required|is_unique[delivery_person.dp_nic]|is_unique[user.user_nic]');
        $this->form_validation->set_rules('dp_email', 'dp_email', 'required|valid_email|is_unique[delivery_person.dp_email]|is_unique[user.user_email]');
        $this->form_validation->set_rules('dp_phone', 'dp_phone', 'required|is_unique[delivery_person.dp_phone]');
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
            'dp_address'=>$this->input->post('dp_address'),
            'dp_nic'=>$this->input->post('dp_nic'),
            'dp_email'=>$this->input->post('dp_email'),
            'dp_phone'=>$this->input->post('dp_phone'));

        $this->load->model('Admin_model');
        $this->Admin_model->update_dp(array('dp_id'=>$this->input->post('dp_id')), $data);
        echo json_encode(array("status"=>TRUE));
    }

    public function add_product_details(){

        $this->form_validation->set_rules('product_name', 'product_name', 'required|is_unique[product.product_name]');
        $this->form_validation->set_rules('product_type', 'product_type', 'required');
        $this->form_validation->set_rules('product_description', 'product_description', 'required');
        $this->form_validation->set_rules('product_image', 'product_image', 'required');
        $this->form_validation->set_rules('product_price', 'product_price', 'required');

        if($this->form_validation->run() != FALSE){
            $this->load->model('Admin_model');
            $this->Admin_model->add_product();
            redirect('Admin');
        }
        else{
            echo 'Something Wrong';
        }
    }

    public function update_each_product($product_id){
        $this->load->model('Admin_model');
        $data = $this->Admin_model->get_product($product_id);
        echo json_encode($data);
    }

    public function view_each_customer($cus_id){
        $this->load->model('Admin_model');
        $data = $this->Admin_model->get_each_customer($cus_id);
        echo json_encode($data);
    }

    public function view_each_product_stock($stock_id){
        $this->load->model('Admin_model');
        $data = $this->Admin_model->get_each_main_stock($stock_id);
        echo json_encode($data);
    }

    public function remove_each_customer($cus_id){
        $this->load->model('Admin_model');
        $this->Admin_model->remove_customer($cus_id);
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