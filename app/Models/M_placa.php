<?php

namespace App\Models;

use CodeIgniter\Model;

class M_placa extends Model
{
    protected $table      = 'tb_placamadre';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($numserie)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_placamadre WHERE numserie = '$numserie'");
        return $query;
    }

    function guardar($fk_pc, $socket, $marca, $modelo, $numserie, $status_tec)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_placamadre');
        $data = [
            'fk_pc' => $fk_pc,
            'socket' => $socket,
            'marca' => $marca,
            'modelo' => $modelo,
            'numserie' => $numserie,
            'status_tec' => $status_tec
        ];
        return $builder->insert($data);
    }

    function placas()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_placamadre.id, tb_placamadre.marca, tb_placamadre.modelo, tb_placamadre.`socket`, tb_placamadre.numserie, tb_placamadre.status_tec, tb_pc.nombrepc, tb_pc.inventario FROM tb_placamadre JOIN tb_pc ON tb_pc.id = tb_placamadre.fk_pc ORDER BY tb_placamadre.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_placamadre');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function update_status($id, $estado)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_placamadre SET status_tec  = '$estado' WHERE tb_placamadre.id='$id'");
        return $query;
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_placamadre');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }
}
