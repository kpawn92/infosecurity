<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_impresora extends Model{
    protected $table      = 'tb_printer';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    function row_preport($ns)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_printer WHERE ns = '$ns'");
        return $query;
    }

    function guardar($tipo, $t_repuesto, $multifuncional, $inventario, $marca, $modelo, $ns, $fk_responsable, $status, $status_inv)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_printer');
        $data = [
            'tipo' => $tipo,
            't_repuesto' => $t_repuesto,
            'multifuncional' => $multifuncional,
            'inventario' => $inventario,
            'marca' => $marca,
            'modelo' => $modelo,
            'ns' => $ns,
            'fk_responsable' => $fk_responsable,
            'status' => $status,
            'status_inv' => $status_inv
        ];
        return $builder->insert($data);
    }

    function printers()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_printer.id, tb_printer.tipo, tb_printer.t_repuesto, tb_printer.multifuncional, tb_printer.inventario, tb_printer.marca, tb_printer.modelo, tb_printer.ns, tb_printer.`status`, tb_printer.status_inv, tb_responsable.nombre, tb_responsable.lastname, tb_responsable.cargo FROM tb_printer JOIN tb_responsable ON tb_responsable.id = tb_printer.fk_responsable ORDER BY tb_printer.id DESC");
        return $query->getResultArray();
    }

    function eliminar($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_printer');
        $builder->where('id', $id);
        return $builder->delete();
    }

    function getID()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_printer');
        $builder->selectMax('id');
        return $builder->get()->getRowArray();
    }

    function update_status($id, $estado, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_printer SET tb_printer.`status`  = '$estado', status_inv = '$inventario' WHERE tb_printer.id='$id'");
        return $query;
    }
}