<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller{

    public function user_login()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');



        if ($this->form_validation->run() == FALSE)
        {
            redirect('Home');
        }
        else
        {
            $this->load->model('user_model');
            $result=$this->user_model->userLogin();

            if ($result !=false) {
                $status=$result->status;
                if($status==1){
                    $user_data=array(
                        'user_id'=>$result->id,
                        'name'=>$result->name,
                        'email'=>$result->email,
                        'loggedin'=>TRUE
                    );
                    $this->session->set_userdata($user_data);
                    redirect('Home/customer');
                }
                elseif($status==2){
                    $user_data=array(
                        'user_id'=>$result->id,
                        'name'=>$result->name,
                        'email'=>$result->email,
                        'loggedin'=>TRUE
                    );
                    $this->session->set_userdata($user_data);
                    redirect('Home/delivery_person');
                }
                else{
                    $user_data=array(
                        'user_id'=>$result->id,
                        'name'=>$result->name,
                        'email'=>$result->email,
                        'loggedin'=>TRUE
                    );
                    $this->session->set_userdata($user_data);
                    redirect('Admin');
                }
            }

            else{

//                $this->session->set_flashdata('errmsg','Wrong email and password');
//                redirect('Home');
                echo 'Wrong';
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Home');
    }

    public function user_registration(){
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('company_name', 'company_name', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('nic', 'nic', 'required|is_unique[customer.nic]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('contact_number', 'contact_number', 'required|is_unique[customer.contact_number]');
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


}