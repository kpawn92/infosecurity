<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_cd extends Model{
    protected $table      = 'tb_lectorcompacto';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_lectorcompacto WHERE ns = '$ns'");
        return $query;
    }

    function guardar($fk_pc, $tipo, $marca, $modelo, $ns, $status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_lectorcompacto');
        $data = [
            'fk_pc' => $fk_pc,
            'tipo' => $tipo,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'status' => $status
        ];
        return $builder->insert($data);
    }

    function cds()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_lectorcompacto.id, tb_pc.nombrepc, tb_pc.inventario, tb_lectorcompacto.tipo, tb_lectorcompacto.marca, tb_lectorcompacto.modelo, tb_lectorcompacto.ns, tb_lectorcompacto.`status` FROM tb_lectorcompacto JOIN tb_pc ON tb_pc.id = tb_lectorcompacto.fk_pc ORDER BY tb_lectorcompacto.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_lectorcompacto');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_lectorcompacto');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_lectorcompacto SET tb_lectorcompacto.`status`  = '$estado' WHERE tb_lectorcompacto.id='$id'");
        return $query;
    }
}