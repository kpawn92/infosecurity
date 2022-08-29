<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_raton extends Model{
    protected $table      = 'tb_mouse';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_mouse WHERE ns = '$ns'");
        return $query;
    }

    function guardar($fk_pc, $interfaz, $inventario, $marca, $modelo, $ns, $fecha, $status, $status_inv)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_mouse');
        $data = [
            'fk_pc' => $fk_pc,
            'interfaz' => $interfaz,
            'inventario' => $inventario,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'fecha_exp' => $fecha,
            'status' => $status,
            'status_inv' => $status_inv

        ];
        return $builder->insert($data);
    }

    function ratones()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_mouse.id, tb_pc.nombrepc, tb_pc.inventario, tb_mouse.interfaz, tb_mouse.inventario as inv, tb_mouse.marca, tb_mouse.modelo, tb_mouse.`status`, tb_mouse.status_inv, FROM_UNIXTIME(tb_mouse.fecha_exp, '%d/%m/%Y') as fecha FROM tb_mouse JOIN tb_pc ON tb_pc.id = tb_mouse.fk_pc ORDER BY tb_mouse.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_mouse');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_mouse');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_mouse SET tb_mouse.`status`  = '$estado', status_inv = '$inventario' WHERE tb_mouse.id='$id'");
        return $query;
    }
}