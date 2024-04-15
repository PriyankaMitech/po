<?php

namespace App\Controllers;
use App\Models\Admin_Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';

class Home extends BaseController
{
    public function index()
    {
        $model = new Admin_Model();
      
        $session = session();
        if($this->request->getVar('submit') == 'submit'){

            $where = [
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password')      
            ];
            $result = $model->getsinglerow('tbl_register', $where);
            
            if (!empty($result)) {

                session()->set('user_id', $result->id);
                session()->setFlashdata('success', 'Login successfully.');

                // echo "$session->has('user_id')";exit();

                return redirect()->to('admin_dashboard');



                // return view('admin_dashboard');

            } else {
                session()->setFlashdata('error', 'Invalid credentials.');

                return view('login');
            }
           
            }else{
                if ($session->has('user_id')) {
                    $wherecond = array('id ' => $session->has('user_id'));
                    $data['register_data'] =  $model->getsinglerow('tbl_register', $wherecond);
                    return view('login', $data);
                }else{
                    return view('login');
                }
            }
        return view('login');

        
    }
    public function register()
    {
        if($this->request->getVar('submit') == 'submit'){
     
            $data = [
                'first_name' => $this->request->getVar('first_name'),
                'last_name' => $this->request->getVar('last_name'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'passwordconfirm' => $this->request->getVar('passwordconfirm'),
                'agree' => $this->request->getVar('agree'),
            ];
            $db = \Config\Database::Connect();
    
            if ($this->request->getVar('id') == "") {
                $add_data = $db->table('tbl_register');
                $add_data->insert($data);

                $lastInsertId = $db->insertID();
                session()->set('user_id',$lastInsertId);

                session()->setFlashdata('success', 'Register successfully.');
            } else {
                $update_data = $db->table('tbl_register')->where('id', $this->request->getVar('id'));
                $update_data->update($data);

                $lastInsertId = $this->request->getVar('id');
                session()->set('user_id',$lastInsertId);

                session()->setFlashdata('success', 'Data updated successfully.');
            }
            return redirect()->to(base_url());
        }
    
        return view('register');
    }

    public function admin_dashboard()
    {
        if (session()->has('user_id')) { 
            return view('admin_dashboard');
        } else {
            return redirect()->to(base_url());
        }
    }

    public function logout()
    {
        session()->destroy();
        session()->remove('user_id');

        return redirect()->to(base_url());
    }


    public function tax()
    {
        $model = new Admin_Model();
        $uri = service('uri');

        // Get the second segment of the URI
        $segment = $uri->getSegment(2);

        // echo $segment;exit();

        if (session()->has('user_id')) { 

            $wherecond = array('is_deleted ' => '0');
            $data['tax'] =  $model->getalldata('tbl_tax', $wherecond);

            if($segment != ''){

            $wherecond = array('id ' => $segment);
            $data['single'] =  $model->getsinglerow('tbl_tax', $wherecond);
            }


            if($this->request->getVar('submit') == 'submit'){
     
                $data = [
                    'tax_name' => $this->request->getVar('tax_name'), 
                ];
                $db = \Config\Database::Connect();
        
                if ($this->request->getVar('id') == "") {
                    $add_data = $db->table('tbl_tax');
                    $add_data->insert($data);
                    session()->setFlashdata('success', 'Data added successfully.');
                } else {
                    $update_data = $db->table('tbl_tax')->where('id', $this->request->getVar('id'));
                    $update_data->update($data);
                    
                    session()->setFlashdata('success', 'Data updated successfully.');
                }
                return redirect()->to('tax');
            }
          
            return view('tax',$data);
        } else {
            return redirect()->to(base_url());
        }
    }


    public function delete(){
        $uri = service('uri');
        $db = \Config\Database::Connect();


        // Get the second segment of the URI
        $segment1 = $uri->getSegment(2);
        $table = $uri->getSegment(3);

        $data = [
            'is_deleted' => '1', 
        ];
        $delete_data = $db->table($table)->where('id', $segment1);
        $delete_data->update($data);
        session()->setFlashdata('success', 'Data deleted successfully.');

        return redirect()->back();

        
    }


    public function vendor_type()
    {
        $model = new Admin_Model();
        $uri = service('uri');

        // Get the second segment of the URI
        $segment = $uri->getSegment(2);

        // echo $segment;exit();

        if (session()->has('user_id')) { 

            $wherecond = array('is_deleted ' => '0');
            $data['vendor_type'] =  $model->getalldata('tbl_vendor_type', $wherecond);

            if($segment != ''){

            $wherecond = array('id ' => $segment);
            $data['single'] =  $model->getsinglerow('tbl_vendor_type', $wherecond);
            }


            if($this->request->getVar('submit') == 'submit'){
    
                $data = [
                    'vendor_type_name' => $this->request->getVar('vendor_type_name'), 
                ];
                $db = \Config\Database::Connect();
        
                if ($this->request->getVar('id') == "") {
                    $add_data = $db->table('tbl_vendor_type');
                    $add_data->insert($data);
                    session()->setFlashdata('success', 'Data added successfully.');
                } else {
                    $update_data = $db->table('tbl_vendor_type')->where('id', $this->request->getVar('id'));
                    $update_data->update($data);
                    
                    session()->setFlashdata('success', 'Data updated successfully.');
                }
                return redirect()->to('vendor_type');
            }
        
            return view('vendor_type',$data);
        } else {
            return redirect()->to(base_url());
        }
    }

    
    public function lostpassword()
    {
        $email = $this->request->getPost('email');
        session()->set('email', $email);
        $model = new Admin_Model();
        $user = $model->getUserByEmail($email);
        if ($user) {
            $verification_code = mt_rand(100000, 999999);
            session()->set('verification_code', $verification_code);
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'siddheshkadgemitech@gmail.com';
                $mail->Password   = 'lxnpuyvyefpbcukr';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                $mail->setFrom('siddheshkadgemitech@gmail.com', 'Open Time Verification Code');
                $mail->addAddress($email, 'Recipient Name');
                $mail->isHTML(true);
                $mail->Subject = 'Email Verification Code';
                $mail->Body = "Your OTP is: $verification_code <br>";
                $mail->send();
                $response = ['status' => 'success'];
                return $this->response->setJSON($response);
            } catch (Exception $e) {
                $response = ['status' => 'error', 'error' => $mail->ErrorInfo];
                return $this->response->setJSON($response);
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Invalid email or role'];
            return $this->response->setJSON($response);
        }
    }

    public function otpvalidate()
    {

        $verification_code = session()->get('verification_code');
        $entered_otp = $this->request->getPost('entered_otp');

        if ($entered_otp == $verification_code) {

            $result = ['status' => 'success'];
            return $this->response->setJSON($result);
        } else {
            $response = ['status' => 'error', 'message' => 'Invalid OTP' ];
            return $this->response->setJSON($response);
        }
    }
    public function newpassword()
    {
       
        $newPassword = $this->request->getPost('new_password');
        $email = session()->get('email');

        $model = new Admin_Model();
        $data = [
            'email' => $email,
            'password' => $newPassword,
            'passwordconfirm'=> $newPassword,
        ];

        $db = \Config\Database::connect();


        $update_data = $db->table('tbl_register')->where('email', $email);
        $update_data->update($data);
        return redirect()->back();
    }


public function menu()
{
    $model = new Admin_Model();
    $uri = service('uri');

    // Get the second segment of the URI
    $segment = $uri->getSegment(2);

    // echo $segment;exit();

    if (session()->has('user_id')) { 

        $wherecond = array('is_deleted ' => '0');
        $data['menu_name'] =  $model->getalldata('tbl_menu', $wherecond);

        if($segment != ''){

        $wherecond = array('id ' => $segment);
        $data['single'] =  $model->getsinglerow('tbl_menu', $wherecond);
        }


        if($this->request->getVar('submit') == 'submit'){

            $data = [
                'menu_name' => $this->request->getVar('menu_name'), 
                'url' => $this->request->getVar('url'), 

            ];
            $db = \Config\Database::Connect();
    
            if ($this->request->getVar('id') == "") {
                $add_data = $db->table('tbl_menu');
                $add_data->insert($data);
                session()->setFlashdata('success', 'Data added successfully.');
            } else {
                $update_data = $db->table('tbl_menu')->where('id', $this->request->getVar('id'));
                $update_data->update($data);
                
                session()->setFlashdata('success', 'Data updated successfully.');
            }
            return redirect()->to('menu');
        }
    
        return view('menu',$data);
    } else {
        return redirect()->to(base_url());
    }
}

    public function user()
    {
        $model = new Admin_Model();
        $uri = service('uri');

        // Get the second segment of the URI
        $segment = $uri->getSegment(2);

        // echo $segment;exit();

        if (session()->has('user_id')) { 

            $wherecond = array('is_deleted ' => '0');
            $data['menu'] =  $model->getalldata('tbl_menu', $wherecond);

            if($segment != ''){

            $wherecond = array('id ' => $segment);
            $data['single'] =  $model->getsinglerow('tbl_register', $wherecond);
            }


            if($this->request->getVar('submit') == 'submit'){
                $accessLevelString = '';    
                $accessLevels = $this->request->getVar('access_level');


                 if (is_array($accessLevels)) {
                        // Convert the array of selected checkboxes to a comma-separated string
                        $accessLevelString = implode(',', $accessLevels);
                    } else {
                        // If no checkboxes are selected, set $accessLevelString to an empty string
                        $accessLevelString = '';
                    }

                $data = [
                    'name' => $this->request->getVar('name'),
                    'mobile_number' => $this->request->getVar('mobile_number'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'passwordconfirm' => $this->request->getVar('passwordconfirm'),
                    'type' => 'User',
                    'user_id' => session()->has('user_id'),
                    'selectAllCheckbox' => $this->request->getVar('selectAllCheckbox'),
                    'designation' =>$this->request->getVar('designation'),
                    'access_level' =>$accessLevelString,

                ];
                $db = \Config\Database::Connect();
        
                if ($this->request->getVar('id') == "") {
                    $add_data = $db->table('tbl_register');
                    $add_data->insert($data);
                    session()->setFlashdata('success', 'Data added successfully.');
                } else {
                    $update_data = $db->table('tbl_register')->where('id', $this->request->getVar('id'));
                    $update_data->update($data);
                    
                    session()->setFlashdata('success', 'Data updated successfully.');
                }
                return redirect()->to('user');
            }
          
            return view('user',$data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function get_user_list(){
        $model = new Admin_Model();

        if (session()->has('user_id')) { 
            // $wherecond = array('type' => 'User','is_deleted ' => '0');
            // $data['user_data'] =  $model->getalldata('tbl_register', $wherecond);

            $select = 'tbl_register.*, tbl_user.name as user_name';
            $table1 = 'tbl_register';
            $table2 = 'tbl_register as tbl_user';
            $joinCond = 'tbl_user.id = tbl_register.user_id';
            $wherecond = array('tbl_register.type' => 'User', 'tbl_register.is_deleted' => '0');
            $type = 'left';
            $data['user_data'] = $model->jointwotables($select,$table1,$table2,$joinCond,$wherecond,$type);


            // $select = 'payment.*, register.full_name';
            // $table1 = 'payment';
            // $table2 = 'register';
            // $table3 = 'countries'; 
            // $joinCond = 'register.id = payment.user_id';
            
            // echo "<pre>";print_r($data['user_data']);exit();
            return view('user_list',$data);
        }else{
            return redirect()->to(base_url());

        }
    }



    public function vendor()
    {
        $model = new Admin_Model();
        $uri = service('uri');

        // Get the second segment of the URI
        $segment = $uri->getSegment(2);

        // echo $segment;exit();

        if (session()->has('user_id')) { 
            $data['country'] = $model->get_country_name();
            $data['states'] = $model->get_states_name();
            $data['citys'] = $model->get_citys_name();


            if($segment != ''){


   

            $wherecond = array('id ' => $segment);
            $data['single'] =  $model->getsinglerow('tbl_vendor', $wherecond);
            return view('vendor',$data);

            }


            if($this->request->getVar('submit') == 'submit'){
                $data = [
                    'vendor_name' => $this->request->getVar('vendor_name'),
                    'contact_p_name' => $this->request->getVar('contact_p_name'),
                    'phone_no' => $this->request->getVar('phone_no'),
                    'phone_no_two' => $this->request->getVar('phone_no_two'),
                    'email' => $this->request->getVar('email'),
                    'country_id' => $this->request->getVar('country_id'),
                    'state_id' => $this->request->getVar('state_id'),
                    'city_id' => $this->request->getVar('city_id'),
                    'address' => $this->request->getVar('address'),
                    'vendor_type' => $this->request->getVar('vendor_type'),
                    'gst_no' => $this->request->getVar('gst_no'),
                    'pan_no' => $this->request->getVar('pan_no'),
                    'bank_name' => $this->request->getVar('bank_name'),
                    'branch_name' => $this->request->getVar('branch_name'),
                    'account_name' => $this->request->getVar('account_name'),
                    'account_number' => $this->request->getVar('account_number'),   
                    'ifsc_code' => $this->request->getVar('ifsc_code'),
                    'upi_id' => $this->request->getVar('upi_id'),
                    'mobile_nolwba' => $this->request->getVar('mobile_nolwba'),

                ];
                // echo "<pre>";print_r($data);exit();
                $db = \Config\Database::Connect();
        
                if ($this->request->getVar('id') == "") {
                    $add_data = $db->table('tbl_vendor');
                    $add_data->insert($data);
                    session()->setFlashdata('success', 'Data added successfully.');
                } else {
                    $update_data = $db->table('tbl_vendor')->where('id', $this->request->getVar('id'));
                    $update_data->update($data);
                    
                    session()->setFlashdata('success', 'Data updated successfully.');
                }
                return redirect()->to('add-vendor');
            }
            // echo "<pre>";print_r($data['country']);exit();

            return view('vendor',$data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function get_vendor_list(){
        $model = new Admin_Model();

        if (session()->has('user_id')) { 
            $wherecond = array('is_deleted ' => '0');
            $data['vendor_data'] =  $model->getalldata('tbl_vendor', $wherecond);
            return view('vendor_list',$data);
        }else{
            return redirect()->to(base_url());

        }
    }
    
	public function get_state_name_location(){
        $model = new Admin_Model();
        $country_id = $this->request->getVar('country_id');
        // echo "hiii";
        // echo $country_id; exit();

		$model->get_state_name_location($country_id);
	}

    public function get_city_name_location(){

        $model = new Admin_Model();
        $state_id = $this->request->getVar('state_id');
   
		$model->get_city_name_location($state_id);
	}





}
