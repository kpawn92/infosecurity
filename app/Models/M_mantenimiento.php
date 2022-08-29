<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_mantenimiento extends Model{
    protected $table      = 'tb_mantenimiento';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function guardar($fk_pc, $fecha, $observacion)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_mantenimiento');
        $data = [
            'fk_pc' => $fk_pc,
            'fecha' => $fecha,
            'observacion' => $observacion
        ];
        return $builder->insert($data);
    }

    function mantenimientos()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_mantenimiento.id, tb_pc.nombrepc, tb_pc.inventario, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_mantenimiento.observacion, FROM_UNIXTIME(tb_mantenimiento.fecha,'%d/%m/%Y') as fecha  FROM tb_mantenimiento JOIN tb_pc ON tb_pc.id = tb_mantenimiento.fk_pc JOIN tb_responsable ON tb_responsable.id = tb_pc.fk_responsable ORDER BY tb_mantenimiento.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_mantenimiento');
        $builder->where('id', $id);
        return $builder->delete();
    }
}