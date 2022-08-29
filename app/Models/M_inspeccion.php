<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_inspeccion extends Model{
    protected $table      = 'tb_inspeccion';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($fecha_inspeccion, $fk_responsable)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT fecha_inspeccion, fk_responsable FROM tb_inspeccion WHERE fecha_inspeccion = '$fecha_inspeccion' AND fk_responsable = '$fk_responsable'");
        return $query;
    }

    function guardar($fecha_inspeccion, $fk_responsable, $fk_dpto, $accion)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_inspeccion');
        $data = [
            'fecha_inspeccion' => $fecha_inspeccion,
            'fk_responsable' => $fk_responsable,
            'fk_dpto' => $fk_dpto,
            'accion' => $accion
        ];
        return $builder->insert($data);
    }

    function inspecciones()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_inspeccion.id, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_dpto.dpto, FROM_UNIXTIME(tb_inspeccion.fecha_inspeccion, '%d/%m/%Y') as fecha, tb_inspeccion.accion FROM tb_inspeccion JOIN tb_responsable ON tb_responsable.id = tb_inspeccion.fk_responsable JOIN tb_dpto ON tb_dpto.id = tb_inspeccion.fk_dpto  ORDER BY tb_inspeccion.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_inspeccion');
        $builder->where('id', $id);
        return $builder->delete();
    }
}