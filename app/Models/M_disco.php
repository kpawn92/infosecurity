<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_disco extends Model{
    protected $table      = 'tb_hdd';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_hdd WHERE ns = '$ns'");
        return $query;
    }

    function guardar($fk_pc, $capacidad, $marca, $modelo, $ns, $status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_hdd');
        $data = [
            'fk_pc' => $fk_pc,
            'capacidad' => $capacidad,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'status' => $status
        ];
        return $builder->insert($data);
    }

    function discos()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_hdd.id, tb_pc.nombrepc, tb_pc.inventario, tb_hdd.capacidad, tb_hdd.marca as mhdd, tb_hdd.modelo, tb_hdd.ns, tb_hdd.`status` FROM tb_hdd JOIN tb_pc ON tb_pc.id = tb_hdd.fk_pc ORDER BY tb_hdd.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_hdd');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_hdd');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_hdd SET tb_hdd.`status`  = '$estado' WHERE tb_hdd.id='$id'");
        return $query;
    }
}