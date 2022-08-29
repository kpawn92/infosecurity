<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_fuente extends Model{
    protected $table      = 'tb_fuente';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_fuente WHERE ns = '$ns'");
        return $query;
    }

    function guardar($fk_pc, $potencia, $marca, $model, $ns, $status)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_fuente');
        $data = [
            'fk_pc' => $fk_pc,
            'potencia' => $potencia,
            'marca' => $marca,
            'model' => $model,
            'ns' => $ns,
            'status' => $status
        ];
        return $builder->insert($data);
    }

    function fuentes()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_fuente.id, tb_pc.nombrepc, tb_pc.inventario, tb_fuente.potencia, tb_fuente.marca, tb_fuente.model, tb_fuente.ns, tb_fuente.`status` FROM tb_fuente JOIN tb_pc ON tb_pc.id = tb_fuente.fk_pc ORDER BY tb_fuente.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_fuente');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_fuente');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_fuente SET tb_fuente.`status`  = '$estado' WHERE tb_fuente.id='$id'");
        return $query;
    }
}