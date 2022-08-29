<?php

namespace App\Models;

use CodeIgniter\Model;

class M_rotura extends Model
{
    protected $table      = 'tb_rotura';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function guardar($fk_pc, $fecha, $tipo_rotura, $observ)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_rotura');
        $data = [
            'fk_pc' => $fk_pc,
            'fecha' => $fecha,
            'tipo_rotura' => $tipo_rotura,
            'observ' => $observ
        ];
        return $builder->insert($data);
    }

    function roturas()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_rotura.id, tb_pc.nombrepc, tb_pc.inventario, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_rotura.tipo_rotura, tb_rotura.observ, FROM_UNIXTIME(tb_rotura.fecha,'%d/%m/%Y') as fecha, FROM_UNIXTIME(tb_rotura.fecha_solucion,'%d/%m/%Y') as fechasol FROM tb_rotura JOIN tb_pc ON tb_pc.id = tb_rotura.fk_pc JOIN tb_responsable ON tb_responsable.id = tb_pc.fk_responsable ORDER BY tb_rotura.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_rotura');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function update_date($id, $fecha_solucion, $observ){
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_rotura SET fecha_solucion  = '$fecha_solucion', observ = '$observ' WHERE tb_rotura.id='$id'");
        return $query;
    }
}
