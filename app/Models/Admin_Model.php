<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model
{
    public function getsinglerow($table, $wherecond)
    {
        $result = $this->db->table($table)->where($wherecond)->get()->getRow();
    
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

}