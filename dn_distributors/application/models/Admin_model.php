<?php
class Admin_model extends CI_model{

    public function insert_customer_data(){

        $data=array(
            'cus_name'=>$this->input->post('cus_name'),
            'cus_company_name'=>$this->input->post('cus_company_name'),
            'cus_company_address'=>$this->input->post('cus_company_address'),
            'cus_nic'=>$this->input->post('cus_nic'),
            'cus_email'=>$this->input->post('cus_email'),
            'cus_phone'=>$this->input->post('cus_phone'),
            'cus_company_phone'=>$this->input->post('cus_company_phone'),
            'password'=>sha1($this->input->post('password')),
            'confirm_password'=>sha1($this->input->post('confirm_password')));

        $query1 = "INSERT INTO customer(cus_nic, cus_name, cus_email, cus_phone, cus_company_name, cus_company_address, cus_company_phone) VALUES ('$data[cus_nic]', '$data[cus_name]', '$data[cus_email]', '$data[cus_phone]', '$data[cus_company_name]', '$data[cus_company_address]', '$data[cus_company_phone]')";
        $query2 = "INSERT INTO user(user_nic, user_name, user_email, password, confirm_password) VALUES ('$data[cus_nic]', '$data[cus_name]', '$data[cus_email]', '$data[password]', '$data[confirm_password]')";

        $this->db->query($query1);
        $this->db->query($query2);
    }

    public function insert_dp_data(){

        $data=array(
            'dp_name'=>$this->input->post('dp_name'),
            'dp_address'=>$this->input->post('dp_address'),
            'dp_nic'=>$this->input->post('dp_nic'),
            'dp_email'=>$this->input->post('dp_email'),
            'dp_phone'=>$this->input->post('dp_phone'),
            'password'=>sha1($this->input->post('password')),
            'confirm_password'=>sha1($this->input->post('confirm_password')));

        $query1 = "INSERT INTO delivery_person(dp_nic, dp_name, dp_address, dp_email, dp_phone) VALUES ('$data[dp_nic]', '$data[dp_name]', '$data[dp_address]', '$data[dp_email]', '$data[dp_phone]')";
        $query2 = "INSERT INTO user(user_nic, user_name, user_email, password, confirm_password, user_status) VALUES ('$data[dp_nic]', '$data[dp_name]', '$data[dp_email]', '$data[password]', '$data[confirm_password]', 2)";

        $this->db->query($query1);
        $this->db->query($query2);
    }

    public function update_customer($where, $data){
        $this->db->where($where);
        $this->db->update('customer', $data);
        return $this->db->affected_rows();
//        $data=array(
//            'customer_id'=>$this->input->post('customer_id'),
//            'customer_name'=>$this->input->post('customer_name'),
//            'company_name'=>$this->input->post('company_name'),
//            'address'=>$this->input->post('address'),
//            'nic'=>$this->input->post('nic'),
//            'email'=>$this->input->post('email'),
//            'contact_number'=>$this->input->post('contact_number'));
//            'password'=>sha1($this->input->post('password')),
//            'confirm_password'=>sha1($this->input->post('confirm_password')));

//        $query1 = "UPDATE customer SET customer_name = '$data[customer_name]', company_name = '$data[company_name]', address = '$data[address]', nic = '$data[nic]', email = '$data[email]', contact_number = '$data[contact_number]' WHERE customer_id = '$data[customer_id]'";
//        $query2 = "UPDATE user SET email = '$data[email]', password = '$data[password]', confirm_password = '$data[confirm_password]' WHERE name = '$data[name]'";

//        $this->db->query($query1);
//        $this->db->query($query2);
    }

    public function insert_vehicle_stock(){

        $data=array(
            'date'=>$this->input->post('date'),
            'product_name'=>$this->input->post('product_name'),
            'added_quantity'=>$this->input->post('added_quantity'));

        $query1 = "INSERT INTO vehicle_stock(date, product_name, added_quantity, remain_quantity) VALUES ('$data[date]', '$data[product_name]', '$data[added_quantity]', '$data[added_quantity]')";

        $this->db->query($query1);
    }

    public function update_dp($where, $data){
        $this->db->where($where);
        $this->db->update('delivery_person', $data);
        return $this->db->affected_rows();
    }

    public function get_customer_data(){
        $query1 = "SELECT * FROM customer WHERE cus_availability = 1";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_vehicle_stock(){
        $query1 = "SELECT * FROM vehicle_stock";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_order_data(){
        $query1 = "SELECT * FROM orders";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_order_product_data(){
        $query1 = "SELECT * FROM order_product";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_main_stock(){
        $query1 = "SELECT * FROM stock";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_dp_data(){
        $query1 = "SELECT * FROM delivery_person WHERE dp_availability = 1";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_pending_orders(){
        $query1 = "SELECT * FROM order_details WHERE order_status = 1";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_delivered_orders(){
        $query1 = "SELECT * FROM order_details WHERE order_status = 2";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function get_product_details(){
        $query1 = "SELECT * FROM product";
        $query2 = $this->db->query($query1);
        return $query2;
    }

    public function remove_customer($cus_id){

        $query = "UPDATE customer SET cus_availability = 2 WHERE cus_id = $cus_id";
        $this->db->query($query);
    }

    public function remove_product(){
        $data = array(
            'product_code'=>$this->input->post('product_code')
        );

        $query = "UPDATE product SET status = 2 WHERE product_code = '$data[product_code]'";
        $this->db->query($query);
    }


    public function remove_dp($dp_id){

        $query = "UPDATE delivery_person SET dp_availability = 2 WHERE dp_id = $dp_id";
        $this->db->query($query);
    }

    public function add_product(){

        $data=array(
            'product_name'=>$this->input->post('product_name'),
            'product_type'=>$this->input->post('product_type'),
            'product_description'=>$this->input->post('product_description'),
            'product_image'=>$this->input->post('product_image'),
            'product_price'=>$this->input->post('product_price'));

        $query1 = "INSERT INTO product(product_name, product_type, product_description, product_image, product_price) VALUES ('$data[product_name]', '$data[product_type]', '$data[product_description]', '$data[product_image]', '$data[product_price]')";

        $this->db->query($query1);
    }

    public function update_product($where, $data){

        $this->db->where($where);
        $this->db->update('product', $data);
        return $this->db->affected_rows();
    }

    public  function get_each_customer($cus_id){
        $query = $this->db->query("SELECT * FROM customer WHERE cus_id = $cus_id");
        return $query->row();
    }

    public  function get_each_main_stock($stock_id){
        $query = $this->db->query("SELECT * FROM stock WHERE stock_id = $stock_id");
        return $query->row();
    }

    public function get_product($product_id){
        $query = $this->db->query("SELECT * FROM product WHERE product_id = $product_id");
        return $query->row();
    }

    public  function get_each_dp($dp_id){
        $query = $this->db->query("SELECT * FROM delivery_person WHERE dp_id = $dp_id");
        return $query->row();
    }

    public  function get_each_pending_order($order_number){
        $query = $this->db->query("SELECT * FROM order_details WHERE order_number = $order_number");
        return $query->row();
    }

    public  function get_each_delivered_order($order_number){
        $query = $this->db->query("SELECT * FROM order_details WHERE order_number = $order_number");
        return $query->row();
    }

    public function search_customer($query){
        $this->db->select("*");
        $this->db->from("customer");

        if($query != ''){
            $this->db->like('customer_name', $query);
        }

        return $this->db->get();
    }
}