<?php

namespace App\Models;

use CodeIgniter\Model;

class M_op_estado extends Model
{
    protected $table      = 'tb_op_estado';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';

    ///* PLACA MADRE (MotherBoard) *///
    function save_placa($idequipo, $equipo, $status_tec, $fecha)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_op_estado');
        $data = [
            'idequipo' => $idequipo,
            'equipo' => $equipo,
            'estado' => $status_tec,
            'fecha' => $fecha
        ];
        return $builder->insert($data);
    }

    function save_inv($idequipo, $equipo, $status_tec, $date, $inventario)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_op_estado');
        $data = [
            'idequipo' => $idequipo,
            'equipo' => $equipo,
            'estado' => $status_tec,
            'fecha' => $date,
            'inventario' => $inventario
        ];
        return $builder->insert($data);
    }

    function selectID($id, $equipo)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT id FROM tb_op_estado WHERE tb_op_estado.idequipo = '$id' AND tb_op_estado.equipo = '$equipo'");
        return $query->getRowArray();
    }

    function update_st($idRow, $estado, $fecha)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_op_estado SET estado  = '$estado', fecha = '$fecha' WHERE tb_op_estado.id='$idRow'");
        return $query;
    }

    function update_inv($idRow, $estado, $fecha, $inventario)
    {
        $db = \Config\Database::connect();
        $query = $db->query("UPDATE tb_op_estado SET estado  = '$estado', fecha = '$fecha', inventario = '$inventario' WHERE tb_op_estado.id='$idRow'");
        return $query;
    }

    function eliminar($idRow)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_op_estado');
        $builder->where('id', $idRow);
        return $builder->delete();
    }

    function bien()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(tb_op_estado.estado) as bien FROM tb_op_estado WHERE estado = 1");
        return $query->getRowArray();
    }

    function mal()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(tb_op_estado.estado) as mal FROM tb_op_estado WHERE estado = 2");
        return $query->getRowArray();
    }

    function regular()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(tb_op_estado.estado) as regular FROM tb_op_estado WHERE estado = 3");
        return $query->getRowArray();
    }

    function activo()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(tb_op_estado.inventario) as activo FROM tb_op_estado WHERE inventario = 1");
        return $query->getRowArray();
    }

    function inactivo()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(tb_op_estado.inventario) as inactivo FROM tb_op_estado WHERE inventario = 2");
        return $query->getRowArray();
    }

    function baja()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(tb_op_estado.inventario) as baja FROM tb_op_estado WHERE inventario = 3");
        return $query->getRowArray();
    }

    function count_cpu()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(tb_pc.id) as pcs FROM tb_pc");
        return $query->getRowArray();
    }

    function count_dpto()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as dpto FROM tb_dpto");
        return $query->getRowArray();
    }

    function count_isp()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as inspeccion FROM tb_inspeccion");
        return $query->getRowArray();
    }

    function count_controles($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as inspeccion, FROM_UNIXTIME(tb_inspeccion.fecha_inspeccion,'%m-%Y') as dateInsp FROM tb_inspeccion WHERE FROM_UNIXTIME(tb_inspeccion.fecha_inspeccion,'%m') = '$id'");
        return $query->getRowArray();
    }

    function count_rotura()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as rotura FROM tb_rotura");
        return $query->getRowArray();
    }

    function count_def($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as deficiencias FROM tb_incidencia WHERE FROM_UNIXTIME(tb_incidencia.fecha,'%m') = '$id'");
        return $query->getRowArray();
    }

    function count_virus($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as virus FROM tb_virus WHERE FROM_UNIXTIME(fecha,'%m') = '$id'");
        return $query->getRowArray();
    }

    function count_incidencia()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as incidencia FROM tb_incidencia");
        return $query->getRowArray();
    }

    function mes($year_up)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT FROM_UNIXTIME(tb_incidencia.fecha,'%M') as mes FROM tb_incidencia WHERE FROM_UNIXTIME(tb_incidencia.fecha,'%Y') = '$year_up' GROUP BY FROM_UNIXTIME(tb_incidencia.fecha,'%m')");
        return $query->getResultArray();
    }

    function meses()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_inspeccion.id, FROM_UNIXTIME(tb_inspeccion.fecha_inspeccion,'%m') as nmes, FROM_UNIXTIME(tb_inspeccion.fecha_inspeccion,'%M') as mes, FROM_UNIXTIME(tb_inspeccion.fecha_inspeccion,'%Y') as `year` FROM tb_inspeccion GROUP BY FROM_UNIXTIME(tb_inspeccion.fecha_inspeccion,'%m') DESC");
        return $query->getResultArray();
    }

    function cantidad_incidencias($year_up)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as cant FROM tb_incidencia WHERE FROM_UNIXTIME(tb_incidencia.fecha,'%Y') = '$year_up' GROUP BY FROM_UNIXTIME(tb_incidencia.fecha,'%m')");
        return $query->getResultArray();
    }

    function count_inspecciones($year_up)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(*) as total FROM tb_inspeccion WHERE FROM_UNIXTIME(tb_inspeccion.fecha_inspeccion,'%Y') = '$year_up' GROUP BY FROM_UNIXTIME(tb_inspeccion.fecha_inspeccion,'%m')");
        return $query->getResultArray();
    }

    function top_cpu()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_pc.id, nombrepc, inventario, mac, FROM_UNIXTIME(fecha_inicio,'%Y') as fecha FROM tb_pc ORDER BY fecha_inicio ASC LIMIT 0, 5");
        return $query->getResultArray();
    }

    function top_mant($m_up)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_mantenimiento.id, nombrepc, inventario, FROM_UNIXTIME(tb_mantenimiento.fecha,'%d') AS fecha FROM tb_mantenimiento JOIN tb_pc ON tb_pc.id = tb_mantenimiento.fk_pc WHERE FROM_UNIXTIME(tb_mantenimiento.fecha,'%m') = '$m_up' ORDER BY fecha ASC LIMIT 0, 5");
        return $query->getResultArray();
    }

    function p_incidencia_mesAnterior($m_up)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(tb_incidencia.fecha) as fecha FROM tb_incidencia WHERE FROM_UNIXTIME(fecha,'%m') = '$m_up' - 1");
        return $query->getRowArray();
    }

    function p_incidencia_mesActual($m_up)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(tb_incidencia.fecha) as fecha FROM tb_incidencia WHERE FROM_UNIXTIME(fecha,'%m') = '$m_up'");
        return $query->getRowArray();
    }

    function cpu_listas()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_pc.id, nombrepc, tb_pc.inventario, tb_dpto.dpto FROM tb_pc JOIN tb_dpto ON tb_dpto.id = tb_pc.fk_dpto JOIN tb_responsable ON tb_responsable.id = tb_pc.fk_responsable JOIN tb_placamadre ON tb_placamadre.fk_pc = tb_pc.id JOIN tb_micro ON tb_micro.fk_placa = tb_placamadre.id JOIN tb_fuente ON tb_fuente.fk_pc = tb_pc.id JOIN tb_lectorcompacto ON tb_lectorcompacto.fk_pc = tb_pc.id JOIN tb_teclado ON tb_teclado.fk_pc = tb_pc.id JOIN tb_mouse ON tb_mouse.fk_pc = tb_pc.id");
        return $query->getResultArray();
    }

    function expediente($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_pc.id, nombrepc, ip, mac, sello_seguridad, so, tb_pc.inventario as invpc, tb_pc.marca as marcapc, tb_pc.modelo as modelpc, tb_placamadre.`socket` as sokplaca, tb_placamadre.marca as marcaplaca, tb_placamadre.modelo as modelplaca, tb_placamadre.numserie as nsplaca, tb_micro.velocidad, tb_micro.cantnucleos, tb_micro.marca as marcamicro, tb_micro.modelo as modelmicro, tb_micro.ns as nsmicro, tb_fuente.potencia, tb_fuente.marca as marcafuente, tb_fuente.model as modelfuente, tb_fuente.ns as nsfuente, tb_lectorcompacto.tipo as tlector, tb_lectorcompacto.marca as marcalector, tb_lectorcompacto.modelo as modellector, tb_lectorcompacto.ns as nslector, tb_teclado.interfaz as it, tb_teclado.inventario as invteclado, tb_teclado.marca as marcateclado, tb_teclado.modelo as modelteclado, tb_mouse.interfaz as im, tb_mouse.marca as marcamouse, tb_mouse.modelo as modelmouse, tb_mouse.inventario as invmouse, tb_responsable.nombre, tb_responsable.lastname,tb_responsable.cargo, tb_dpto.dpto FROM tb_pc JOIN tb_dpto ON tb_dpto.id = tb_pc.fk_dpto JOIN tb_responsable ON tb_responsable.id = tb_pc.fk_responsable JOIN tb_placamadre ON tb_placamadre.fk_pc = tb_pc.id JOIN tb_micro ON tb_micro.fk_placa = tb_placamadre.id JOIN tb_fuente ON tb_fuente.fk_pc = tb_pc.id JOIN tb_lectorcompacto ON tb_lectorcompacto.fk_pc = tb_pc.id JOIN tb_teclado ON tb_teclado.fk_pc = tb_pc.id JOIN tb_mouse ON tb_mouse.fk_pc = tb_pc.id WHERE tb_pc.id = '$id'");
        return $query->getRowArray();
    }

    function speaker($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_speaker.inventario, tb_speaker.marca, tb_speaker.modelo, tb_speaker.ns FROM tb_speaker JOIN tb_pc ON tb_pc.id = tb_speaker.fk_pc WHERE tb_pc.id = '$id'");
        return $query->getRowArray();
    }

    function ups($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_ups.inventario, tb_ups.marca, tb_ups.modelo, tb_ups.ns FROM tb_ups JOIN tb_pc ON tb_pc.id = tb_ups.fk_pc WHERE tb_pc.id = '$id'");
        return $query->getRowArray();
    }

    function display($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_monitor.tipo, tb_monitor.pulgadas, tb_monitor.inventario, tb_monitor.marca, tb_monitor.modelo, tb_monitor.ns FROM tb_monitor JOIN tb_pc ON tb_pc.id = tb_monitor.fk_pc WHERE tb_pc.id = '$id'");
        return $query->getRowArray();
    }

    function cAccionesInsp($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(accion) as accion FROM tb_inspeccion WHERE FROM_UNIXTIME(fecha_inspeccion,'%m') ='$id'");
        return $query->getRowArray();
    }
    function cAccionesVirus($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(accion) as vaccion FROM tb_virus WHERE FROM_UNIXTIME(fecha, '%m') ='$id'");
        return $query->getRowArray();
    }
    function cAccionesincide($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(acciones) as iaccion FROM tb_incidencia WHERE FROM_UNIXTIME(fecha, '%m') ='$id'");
        return $query->getRowArray();
    }

    function cmant($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as mant FROM tb_mantenimiento WHERE FROM_UNIXTIME(fecha, '%m') ='$id'");
        return $query->getRowArray();
    }

    function crotura($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as rotura FROM tb_rotura WHERE FROM_UNIXTIME(fecha, '%m') ='$id'");
        return $query->getRowArray();
    }

    function csalva($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as salva FROM tb_salva WHERE FROM_UNIXTIME(fecha, '%m') ='$id'");
        return $query->getRowArray();
    }

    function discos_hdd($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tb_hdd WHERE fk_pc = '$id'");
        return $query->getResultArray();
    }

    function ram_exp($id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tb_memoria.tipo, tb_memoria.capacidad, tb_memoria.marca, tb_memoria.modelo, tb_memoria.ns FROM tb_memoria JOIN tb_placamadre	ON tb_placamadre.id = tb_memoria.fk_placa JOIN tb_pc ON tb_pc.id = tb_placamadre.fk_pc WHERE tb_pc.id = '$id'");
        return $query->getResultArray();
    }

    function count_placa()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as placa FROM tb_placamadre");
        return $query->getRowArray();
    }

    function count_fuentes()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as fuentes FROM tb_fuente");
        return $query->getRowArray();
    }

    function count_hdd()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as discos FROM tb_hdd");
        return $query->getRowArray();
    }

    function count_teclad()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as teclados FROM tb_teclado");
        return $query->getRowArray();
    }

    function count_mous()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as mouses FROM tb_mouse");
        return $query->getRowArray();
    }

    function count_ups()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as ups FROM tb_ups");
        return $query->getRowArray();
    }
    function count_display()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as monitores FROM tb_monitor");
        return $query->getRowArray();
    }

    function count_printers()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as impresoras FROM tb_printer");
        return $query->getRowArray();
    }

    function count_routers()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as routers FROM tb_router");
        return $query->getRowArray();
    }

    function count_switch()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as switch FROM tb_switch");
        return $query->getRowArray();
    }

    function count_phone()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT COUNT(id) as phones FROM tb_telefono");
        return $query->getRowArray();
    }
}
