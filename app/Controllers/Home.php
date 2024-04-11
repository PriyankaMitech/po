<?php

namespace App\Controllers;
use App\Models\Admin_Model;


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

    

   

}
