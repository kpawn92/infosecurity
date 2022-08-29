<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_Responsable extends Model{
    protected $table      = 'tb_responsable';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function guardar($nombre, $lastname, $cargo)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_responsable');
        $data = [
            'nombre' => $nombre,
            'lastname' => $lastname,
            'cargo' => $cargo,
        ];
        return $builder->insert($data);
    }

    function row_preport($nombre, $lastname, $cargo)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_responsable WHERE nombre = '$nombre' AND lastname = '$lastname' AND cargo = '$cargo'");
        return $query;
    }
}