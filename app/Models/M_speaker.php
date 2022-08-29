<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_speaker extends Model{
    protected $table      = 'tb_speaker';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_speaker WHERE ns = '$ns'");
        return $query;
    }

    function guardar($fk_pc, $inventario, $marca, $modelo, $ns, $fecha_inicia, $status, $status_inv)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_speaker');
        $data = [
            'fk_pc' => $fk_pc,
            'inventario' => $inventario,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'fecha_inicia' => $fecha_inicia,
            'status' => $status,
            'status_inv' => $status_inv

        ];
        return $builder->insert($data);
    }

    function bocinas()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_speaker.id, tb_pc.nombrepc, tb_pc.inventario, tb_speaker.inventario as inv, tb_speaker.marca, tb_speaker.modelo, tb_speaker.ns, tb_speaker.`status`, tb_speaker.status_inv, FROM_UNIXTIME(tb_speaker.fecha_inicia, '%d/%m/%Y') as fecha FROM tb_speaker JOIN tb_pc ON tb_pc.id = tb_speaker.fk_pc ORDER BY tb_speaker.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_speaker');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_speaker');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_speaker SET tb_speaker.`status`  = '$estado', status_inv = '$inventario' WHERE tb_speaker.id='$id'");
        return $query;
    }
}