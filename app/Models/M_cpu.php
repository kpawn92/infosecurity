<?php

namespace App\Models;

use CodeIgniter\Model;

class M_cpu extends Model
{
    protected $table      = 'tb_pc';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function guardar($nombrepc, $ip, $mac, $inventario, $fk_dpto, $sello_seguridad, $fecha, $marca, $modelo, $so, $fk_responsable)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_pc');
        $data = [
            'nombrepc' => $nombrepc,
            'ip' => $ip,
            'mac' => $mac,
            'inventario' => $inventario,
            'fk_dpto' => $fk_dpto,
            'sello_seguridad' => $sello_seguridad,
            'fecha_inicio' => $fecha,
            'marca' => $marca,
            'modelo' => $modelo,
            'so' => $so,
            'fk_responsable' => $fk_responsable
        ];
        return $builder->insert($data);
    }

    function row_preport($inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_pc WHERE inventario = '$inventario'");
        return $query;
    }

    function unidadCentral()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_pc.id, tb_responsable.id as idresponsable, tb_dpto.id as iddpto, dpto, nombrepc, ip, so, sello_seguridad, mac, tb_pc.inventario, FROM_UNIXTIME(tb_pc.fecha_inicio, '%d/%m/%Y') as fecha,tb_pc.marca, tb_pc.modelo, tb_responsable.nombre, tb_responsable.lastname FROM tb_pc JOIN tb_dpto ON tb_dpto.id = tb_pc.fk_dpto JOIN tb_responsable ON tb_responsable.id = tb_pc.fk_responsable ORDER BY tb_pc.id DESC");
        return $query->getResultArray();
    }
    
    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_pc');
        $builder->where('id', $id);
        return $builder->delete();
    }
}
