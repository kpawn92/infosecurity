<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_modem extends Model{
    protected $table      = 'tb_modem';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_modem WHERE inventario = '$inventario'");
        return $query;
    }

    function guardar($inventario, $marca, $modelo, $status, $status_inv, $fk_responsable, $fk_dpto)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_modem');
        $data = [
            'inventario' => $inventario,
            'marca' => $marca,
            'modelo' => $modelo,
            'status' => $status,
            'status_inv' => $status_inv,
            'fk_responsable' => $fk_responsable,
            'fk_dpto' => $fk_dpto
        ];
        return $builder->insert($data);
    }

    function modems()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_modem.id, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo, tb_dpto.dpto, tb_modem.inventario, tb_modem.marca, tb_modem.modelo, tb_modem.`status`, tb_modem.status_inv FROM tb_modem JOIN tb_responsable ON tb_responsable.id = tb_modem.fk_responsable JOIN tb_dpto ON tb_dpto.id = tb_modem.fk_dpto ORDER BY tb_modem.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_modem');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_modem');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_modem SET tb_modem.`status`  = '$estado', status_inv = '$inventario' WHERE tb_modem.id='$id'");
        return $query;
    }
}