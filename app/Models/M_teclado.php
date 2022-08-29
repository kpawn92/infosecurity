<?php

namespace App\Models;

use CodeIgniter\Model;

class M_teclado extends Model
{
    protected $table      = 'tb_teclado';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_teclado WHERE inventario = '$inventario'");
        return $query;
    }

    function guardar($fk_pc, $interfaz, $inventario, $marca, $modelo, $fecha, $status, $status_inventario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_teclado');
        $data = [
            'fk_pc' => $fk_pc,
            'interfaz' => $interfaz,
            'inventario' => $inventario,
            'marca' => $marca,
            'modelo' => $modelo,
            'fecha_exp' => $fecha,
            'status' => $status,
            'status_inventario' => $status_inventario

        ];
        return $builder->insert($data);
    }

    function teclados()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_teclado.id, tb_pc.nombrepc, tb_pc.inventario, tb_teclado.interfaz, tb_teclado.inventario as inv, tb_teclado.marca, tb_teclado.modelo, tb_teclado.`status`, tb_teclado.status_inventario, FROM_UNIXTIME(tb_teclado.fecha_exp, '%d/%m/%Y') as fecha FROM tb_teclado JOIN tb_pc ON tb_pc.id = tb_teclado.fk_pc ORDER BY tb_teclado.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_teclado');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_teclado');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_teclado SET tb_teclado.`status`  = '$estado', status_inventario = '$inventario' WHERE tb_teclado.id='$id'");
        return $query;
    }
}
