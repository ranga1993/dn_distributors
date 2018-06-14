<?php
class user_model extends CI_model{

    public function insert_user_data(){

        $data=array(
            'name'=>$this->input->post('name'),
            'company_name'=>$this->input->post('company_name'),
            'address'=>$this->input->post('address'),
            'nic'=>$this->input->post('nic'),
            'email'=>$this->input->post('email'),
            'contact_number'=>$this->input->post('contact_number'),
            'password'=>sha1($this->input->post('password')),
            'confirm_password'=>sha1($this->input->post('confirm_password')));

        $query1 = "INSERT INTO customer(customer_name, company_name, address, nic, email, contact_number) VALUES ('$data[name]', '$data[company_name]', '$data[address]', '$data[nic]', '$data[email]', '$data[contact_number]')";
        $query2 = "INSERT INTO user(name, email, password, confirm_password) VALUES ('$data[name]', '$data[email]', '$data[password]', '$data[confirm_password]')";

        $this->db->query($query1);
        $this->db->query($query2);
    }

    public function userLogin(){
        $email=$this->input->post('email');
        $password=sha1($this->input->post('password'));

        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $respond=$this->db->get('user');

        if($respond->num_rows()==1)
        {
            return $respond->row(0);

        }
        else
        {
            return false;
        }
    }
}