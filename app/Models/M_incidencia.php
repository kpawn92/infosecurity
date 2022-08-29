<?php

namespace App\Models;

use CodeIgniter\Model;

class M_incidencia extends Model
{
    protected $table      = 'tb_incidencia';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function guardar($fk_pc, $fecha, $incidencia, $solucionada, $acciones)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_incidencia');
        $data = [
            'fk_pc' => $fk_pc,
            'fecha' => $fecha,
            'incidencia' => $incidencia,
            'solucionada' => $solucionada,
            'acciones' => $acciones
        ];
        return $builder->insert($data);
    }

    function incidencias()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_incidencia.id, tb_pc.nombrepc, tb_pc.inventario, tb_deficiencia.insidencia, FROM_UNIXTIME(tb_incidencia.fecha,'%d/%m/%Y') as fecha, tb_incidencia.solucionada, tb_incidencia.acciones FROM tb_incidencia JOIN tb_pc ON tb_pc.id = tb_incidencia.fk_pc JOIN tb_deficiencia ON tb_deficiencia.id = tb_incidencia.incidencia ORDER BY tb_incidencia.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_incidencia');
        $builder->where('id', $id);
        return $builder->delete();
    }
    function update_sol($id, $solucionada, $acciones, $fecha_solucion)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_incidencia SET tb_incidencia.solucionada  = '$solucionada', tb_incidencia.acciones  = '$acciones', tb_incidencia.fecha_solucion  = '$fecha_solucion' WHERE tb_incidencia.id='$id'");
        return $query;
    }
}
