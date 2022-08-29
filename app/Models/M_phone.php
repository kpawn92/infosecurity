<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_phone extends Model{
    protected $table      = 'tb_telefono';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_telefono WHERE ns = '$ns'");
        return $query;
    }

    function guardar($alcance, $marca, $modelo, $inventario, $ns, $fk_dpto, $fk_responsable, $status, $status_inv)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_telefono');
        $data = [
            'alcance' => $alcance,
            'marca' => $marca,
            'modelo' => $modelo,
            'inventario' => $inventario,
            'ns' => $ns,
            'fk_dpto' => $fk_dpto,
            'fk_responsable' => $fk_responsable,
            'status' => $status,
            'status_inv' => $status_inv
        ];
        return $builder->insert($data);
    }

    function telefonos()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_telefono.id, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_dpto.dpto, tb_telefono.alcance, tb_telefono.inventario, tb_telefono.marca, tb_telefono.modelo, tb_telefono.ns, tb_telefono.`status`, tb_telefono.status_inv FROM tb_telefono JOIN tb_responsable ON tb_responsable.id = tb_telefono.fk_responsable JOIN tb_dpto ON tb_dpto.id = tb_telefono.fk_dpto ORDER BY tb_telefono.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_telefono');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_telefono');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_telefono SET tb_telefono.`status`  = '$estado', status_inv = '$inventario' WHERE tb_telefono.id='$id'");
        return $query;
    }
}