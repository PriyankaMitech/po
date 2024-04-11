<?php

namespace App\Controllers;
use App\Models\Admin_Model;


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

    

   

}
