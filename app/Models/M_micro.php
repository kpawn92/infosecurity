<?php

namespace App\Models;

use CodeIgniter\Model;

class M_micro extends Model
{
    protected $table      = 'tb_micro';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_micro WHERE ns = '$ns'");
        return $query;
    }

    function guardar($fk_placa, $velocidad, $cantnucleos, $marca, $modelo, $ns, $status_tecnico)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_micro');
        $data = [
            'fk_placa' => $fk_placa,
            'velocidad' => $velocidad,
            'cantnucleos' => $cantnucleos,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'status_tecnico' => $status_tecnico
        ];
        return $builder->insert($data);
    }

    function micros()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_micro.id, tb_placamadre.marca, tb_placamadre.numserie, tb_micro.velocidad, tb_micro.cantnucleos, tb_micro.marca as mmarca, tb_micro.modelo, tb_micro.ns, tb_micro.status_tecnico FROM tb_micro JOIN tb_placamadre ON tb_placamadre.id = tb_micro.fk_placa ORDER BY tb_micro.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_micro');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_micro');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_micro SET status_tecnico  = '$estado' WHERE tb_micro.id='$id'");
        return $query;
    }

}
