<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_soft extends Model{
    protected $table      = 'tb_software';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    
    function guardar($fk_pc, $name_soft, $version, $fabricante)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_software');
        $data = [
            'fk_pc' => $fk_pc,
            'name_soft' => $name_soft,
            'version' => $version,
            'fabricante' => $fabricante
        ];
        return $builder->insert($data);
    }

    function softs()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_software.id, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_pc.nombrepc, tb_pc.inventario, tb_software.name_soft, tb_software.version, tb_software.fabricante FROM tb_software JOIN tb_pc ON tb_pc.id = tb_software.fk_pc JOIN tb_responsable ON tb_responsable.id = tb_pc.fk_responsable ORDER BY tb_software.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_software');
        $builder->where('id', $id);
        return $builder->delete();
    }
}