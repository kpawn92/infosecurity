<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_salva extends Model{
    protected $table      = 'tb_salva';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function guardar($fk_pc, $fecha, $name, $observacion)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_salva');
        $data = [
            'fk_pc' => $fk_pc,
            'fecha' => $fecha,
            'name' => $name,
            'observacion' => $observacion
        ];
        return $builder->insert($data);
    }

    function salvas()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_salva.id, tb_pc.nombrepc, tb_pc.inventario, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_salva.`name`, tb_salva.observacion, FROM_UNIXTIME(tb_salva.fecha,'%d/%m/%Y') as fecha FROM tb_salva JOIN tb_pc ON tb_pc.id = tb_salva.fk_pc JOIN tb_responsable ON tb_responsable.id = tb_pc.fk_responsable ORDER BY tb_salva.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_salva');
        $builder->where('id', $id);
        return $builder->delete();
    }
}