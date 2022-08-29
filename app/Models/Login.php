<?php

namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
    protected $table      = 'admin_system';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['user', 'password', 'type', 'name'];

    public function getUser($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('admin_system');
        $builder->where($data);
        return $builder->get()->getResultArray();
    }

    
    public function actualizar($id, $password)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE admin_system SET password='$password' WHERE id= '$id'");
        return $query;
    }
}
