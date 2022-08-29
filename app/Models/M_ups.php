<?php

namespace App\Models;

use CodeIgniter\Model;

class M_ups extends Model
{
    protected $table      = 'tb_ups';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_ups WHERE ns = '$ns'");
        return $query;
    }

    function guardar($fk_pc, $inventario, $marca, $modelo, $ns, $fecha, $status, $status_inv)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_ups');
        $data = [
            'fk_pc' => $fk_pc,
            'inventario' => $inventario,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'fecha' => $fecha,
            'status' => $status,
            'status_inv' => $status_inv
        ];
        return $builder->insert($data);
    }

    function ups()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_ups.id, tb_pc.nombrepc, tb_pc.inventario, tb_ups.inventario as inv, tb_ups.marca, tb_ups.modelo, tb_ups.ns, tb_ups.`status`, tb_ups.status_inv, FROM_UNIXTIME(tb_ups.fecha, '%d/%m/%Y') as fecha FROM tb_ups JOIN tb_pc ON tb_pc.id = tb_ups.fk_pc ORDER BY tb_ups.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_ups');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_ups');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_ups SET tb_ups.`status`  = '$estado', status_inv = '$inventario' WHERE tb_ups.id='$id'");
        return $query;
    }
}
