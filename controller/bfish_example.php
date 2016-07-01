<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('bfish');
  }

  public function save_password()
  {
  
    $user_input = $this->input->post('password');
    
    $hash = encryptPassword($user_input);
    
    // Save encrypted password in the database
    
    echo 'Your encrypted password is ' . $hash;
  
  }
  
  public function login()
  {
  
    $user_input = $this->input->post('password');
    $user_email = $this->input->post('email');
    
    // First check database for user_id against $user_email
    // 
    // User Id is set on $user_id
    
    if(!checkPassword($user_input, $user_id)){

					die('Wrong Password');

				}
				else{

					echo 'Password match!';

				}
  
  }
    
}



