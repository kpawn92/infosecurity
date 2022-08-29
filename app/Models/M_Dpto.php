<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_Dpto extends Model{
    protected $table      = 'tb_dpto';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function guardar($dpto)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_dpto');
        $data = [
            'dpto' => $dpto
        ];
        return $builder->insert($data);
    }

    function row_preport($dpto)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT dpto FROM tb_dpto WHERE dpto = '$dpto'");
        return $query;
    }
}