<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_interruptor extends Model{
    protected $table      = 'tb_switch';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_switch WHERE ns = '$ns'");
        return $query;
    }

    function guardar($inventario, $marca, $modelo, $ns, $programable, $status, $status_inv, $fk_responsable, $fk_dpto)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_switch');
        $data = [
            'inventario' => $inventario,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'programable' => $programable,
            'status' => $status,
            'status_inv' => $status_inv,
            'fk_responsable' => $fk_responsable,
            'fk_dpto' => $fk_dpto
        ];
        return $builder->insert($data);
    }

    function interruptores()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_switch.id, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_dpto.dpto, tb_switch.inventario, tb_switch.marca, tb_switch.modelo, tb_switch.ns, tb_switch.programable, tb_switch.`status`, tb_switch.status_inv FROM tb_switch JOIN tb_responsable ON tb_responsable.id = tb_switch.fk_responsable JOIN tb_dpto ON tb_dpto.id = tb_switch.fk_dpto ORDER BY tb_switch.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_switch');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_switch');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_switch SET tb_switch.`status`  = '$estado', status_inv = '$inventario' WHERE tb_switch.id='$id'");
        return $query;
    }
}