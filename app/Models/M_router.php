<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_router extends Model{
    protected $table      = 'tb_router';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_router WHERE ns = '$ns'");
        return $query;
    }

    function guardar($inventario, $marca, $modelo, $ns, $status, $status_inv, $fk_responsable, $fk_dpto)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_router');
        $data = [
            'inventario' => $inventario,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'status' => $status,
            'status_inv' => $status_inv,
            'fk_responsable' => $fk_responsable,
            'fk_dpto' => $fk_dpto
        ];
        return $builder->insert($data);
    }

    function routers()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_router.id, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_dpto.dpto, tb_router.inventario, tb_router.marca, tb_router.modelo, tb_router.ns, tb_router.`status`, tb_router.status_inv FROM tb_router JOIN tb_responsable ON tb_responsable.id = tb_router.fk_responsable JOIN tb_dpto ON tb_dpto.id = tb_router.fk_dpto ORDER BY tb_router.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_router');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_router');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_router SET tb_router.`status`  = '$estado', status_inv = '$inventario' WHERE tb_router.id='$id'");
        return $query;
    }

}