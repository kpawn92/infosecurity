<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_movimiento extends Model{
    protected $table      = 'tb_movimiento';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function guardar($fk_pc, $fecha, $motivo, $tipo)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_movimiento');
        $data = [
            'fk_pc' => $fk_pc,
            'fecha' => $fecha,
            'motivo' => $motivo,
            'tipo' => $tipo
        ];
        return $builder->insert($data);
    }

    function movimientos()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_movimiento.id, tb_pc.nombrepc, tb_pc.inventario, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_movimiento.tipo, tb_movimiento.motivo, FROM_UNIXTIME(tb_movimiento.fecha,'%d/%m/%Y') as fecha FROM tb_movimiento JOIN tb_pc ON tb_pc.id = tb_movimiento.fk_pc JOIN tb_responsable ON tb_responsable.id = tb_pc.fk_responsable ORDER BY tb_movimiento.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_movimiento');
        $builder->where('id', $id);
        return $builder->delete();
    }
}