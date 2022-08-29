<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_monitor extends Model{
    protected $table      = 'tb_monitor';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_monitor WHERE inventario = '$inventario'");
        return $query;
    }

    function guardar($fk_pc, $tipo, $pulgadas, $inventario, $marca, $modelo, $ns, $fecha_explotacion, $status, $status_inventario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_monitor');
        $data = [
            'fk_pc' => $fk_pc,
            'tipo' => $tipo,
            'pulgadas' => $pulgadas,
            'inventario' => $inventario,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'fecha_explotacion' => $fecha_explotacion,
            'status' => $status,
            'status_inventario' => $status_inventario
        ];
        return $builder->insert($data);
    }

    function monitores()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_monitor.id, tb_pc.nombrepc, tb_pc.inventario, tb_monitor.tipo, tb_monitor.pulgadas, tb_monitor.inventario as inv, tb_monitor.marca, tb_monitor.modelo, tb_monitor.ns, tb_monitor.`status`, tb_monitor.status_inventario, FROM_UNIXTIME(tb_monitor.fecha_explotacion, '%d/%m/%Y') as fecha FROM tb_monitor JOIN tb_pc ON tb_pc.id = tb_monitor.fk_pc ORDER BY tb_monitor.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_monitor');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_monitor');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_monitor SET tb_monitor.`status`  = '$estado', status_inventario = '$inventario' WHERE tb_monitor.id='$id'");
        return $query;
    }
}