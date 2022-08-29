<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_virus extends Model{
    protected $table      = 'tb_virus';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($fk_pc, $fecha)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT fk_pc, fecha, tipo_virus FROM tb_virus WHERE fk_pc = '$fk_pc' AND fecha = '$fecha'");
        return $query;
    }

    function guardar($fk_pc, $fecha, $tipo_virus, $descripcion, $efectos_negativo, $accion, $solucionado)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_virus');
        $data = [
            'fk_pc' => $fk_pc,
            'fecha' => $fecha,
            'tipo_virus' => $tipo_virus,
            'descripcion' => $descripcion,
            'efectos_negativo' => $efectos_negativo,
            'accion' => $accion,
            'solucionado' => $solucionado
        ];
        return $builder->insert($data);
    }

    function virus()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_virus.id, tb_pc.nombrepc, tb_pc.inventario, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_virus.tipo_virus, tb_virus.descripcion, tb_virus.efectos_negativo, tb_virus.accion, tb_virus.solucionado, FROM_UNIXTIME(tb_virus.fecha, '%d/%m/%Y') as fecha FROM tb_virus JOIN tb_pc ON tb_pc.id = tb_virus.fk_pc JOIN tb_responsable ON tb_responsable.id = tb_pc.fk_responsable ORDER BY tb_virus.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_virus');
        $builder->where('id', $id);
        return $builder->delete();
    }
}