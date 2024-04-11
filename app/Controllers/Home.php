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
    public function index(): string
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

                return view('admin_dashboard');

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

                session()->setFlashdata('success', 'update data successfully.');
            }
            return redirect()->to(base_url());
        }
    
        return view('register');
    }

    public function admin_dashboard()
    {
        return view('admin_dashboard');
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
   

}
