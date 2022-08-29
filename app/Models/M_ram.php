<?php

namespace App\Models;

use CodeIgniter\Model;

class M_ram extends Model
{
    protected $table      = 'tb_memoria';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_memoria WHERE ns = '$ns'");
        return $query;
    }

    function guardar($fk_placa, $tipo, $capacidad, $marca, $modelo, $ns, $status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_memoria');
        $data = [
            'fk_placa' => $fk_placa,
            'tipo' => $tipo,
            'capacidad' => $capacidad,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'status' => $status
        ];
        return $builder->insert($data);
    }

    function rams()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_memoria.id, tb_placamadre.marca,  tb_placamadre.numserie, tb_memoria.tipo, tb_memoria.capacidad, tb_memoria.marca as mmarca, tb_memoria.modelo, tb_memoria.ns, tb_memoria.`status` FROM tb_memoria JOIN tb_placamadre ON tb_placamadre.id = tb_memoria.fk_placa ORDER BY tb_memoria.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_memoria');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_memoria');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_memoria SET tb_memoria.`status`  = '$estado' WHERE tb_memoria.id='$id'");
        return $query;
    }
}
