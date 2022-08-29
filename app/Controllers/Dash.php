<?php

namespace App\Controllers;

use App\Models\M_op_estado;

class Dash extends BaseController
{
    public function index()
    {
        /* Status */
        $tb_estado = new M_op_estado();
        $bien = $tb_estado->bien();
        $dato['bien'] = $bien['bien'];
        $mal = $tb_estado->mal();
        $dato['mal'] = $mal['mal'];
        $regular = $tb_estado->regular();
        $dato['regular'] = $regular['regular'];
        /* Status inventarios */
        $activo = $tb_estado->activo();
        $dato['activo'] = $activo['activo'];
        $inactivo = $tb_estado->inactivo();
        $dato['inactivo'] = $inactivo['inactivo'];
        $baja = $tb_estado->baja();
        $dato['baja'] = $baja['baja'];

        $pcs = $tb_estado->count_cpu();
        $dato['pcs'] = $pcs['pcs'];
        $inspeccion = $tb_estado->count_isp();
        $dato['insp'] = $inspeccion['inspeccion'];
        $rotura = $tb_estado->count_rotura();
        $dato['rotura'] = $rotura['rotura'];
        $incide = $tb_estado->count_incidencia();
        $dato['incide'] = $incide['incidencia'];


        $year_up = date('Y', time());
        $m_up = date('m', time());
        $dato['meses'] = $tb_estado->mes($year_up);
        $dato['informs'] = $tb_estado->meses();
        $dato['cant'] = $tb_estado->cantidad_incidencias($year_up);
        $dato['total'] = $tb_estado->count_inspecciones($year_up);

        $dato['top_cpus'] = $tb_estado->top_cpu();
        $dato['top_mant'] = $tb_estado->top_mant($m_up);
        $m_anterior = $tb_estado->p_incidencia_mesAnterior($m_up);
        $dato['mes_anterior'] = $m_anterior['fecha'];
        $m_actual = $tb_estado->p_incidencia_mesActual($m_up);
        $dato['mes_actual'] = $m_actual['fecha'];

        $dato['expedientes'] = $tb_estado->cpu_listas();

        $placas = $tb_estado->count_placa();
        $dato['placas'] = $placas['placa'];

        $fuentes = $tb_estado->count_fuentes();
        $dato['fuentes'] = $fuentes['fuentes'];

        $hdds = $tb_estado->count_hdd();
        $dato['hdds'] = $hdds['discos'];
        $teclad = $tb_estado->count_teclad();
        $dato['teclads'] = $teclad['teclados'];
        $ratones = $tb_estado->count_mous();
        $dato['ratones'] = $ratones['mouses'];
        $backup = $tb_estado->count_ups();
        $dato['ups'] = $backup['ups'];
        $display = $tb_estado->count_display();
        $dato['monitores'] = $display['monitores'];
        $printers = $tb_estado->count_printers();
        $dato['impresoras'] = $printers['impresoras'];
        $routers = $tb_estado->count_routers();
        $dato['routers'] = $routers['routers'];
        $swtch = $tb_estado->count_switch();
        $dato['swtch'] = $swtch['switch'];
        $phons = $tb_estado->count_phone();
        $dato['phons'] = $phons['phones'];
        return view('paginas/dash', $dato);
    }

    public function report()
    {
        $tb_estado = new M_op_estado();
        $request = \Config\Services::request();
        extract($request->getPost());
        $dato['expediente'] = $tb_estado->expediente($id);
        $dato['bocina'] = $tb_estado->speaker($id);
        $dato['ups'] = $tb_estado->ups($id);
        $dato['display'] = $tb_estado->display($id);
        $dato['discos'] = $tb_estado->discos_hdd($id);
        $dato['memorias'] = $tb_estado->ram_exp($id);

        return view('paginas/reporte', $dato);
    }

    public function informSI()
    {
        $tb_estado = new M_op_estado();
        
        $request = \Config\Services::request();
        extract($request->getPost());
        $pcs = $tb_estado->count_cpu();
        $dato['pcs'] = $pcs['pcs'];
        $dpto = $tb_estado->count_dpto();
        $dato['dptos'] = $dpto['dpto'];
        $inspeccion = $tb_estado->count_controles($id);
        $dato['insp'] = $inspeccion['inspeccion'];
        $dato['fechaInsp'] = $inspeccion['dateInsp'];
        $deficiencias = $tb_estado->count_def($id);
        $dato['def'] = $deficiencias['deficiencias'];
        $virus = $tb_estado->count_virus($id);
        $dato['virus'] = $virus['virus'];
        $cantAccionInsp = $tb_estado->cAccionesInsp($id);
        $dato['cantAccionInsp'] = $cantAccionInsp['accion'];
        $cAccionesVirus = $tb_estado->cAccionesVirus($id);
        $dato['cAccionesVirus'] = $cAccionesVirus['vaccion'];
        $cAccionesincide = $tb_estado->cAccionesincide($id);
        $dato['cAccionesincide'] = $cAccionesincide['iaccion'];
        $cmant = $tb_estado->cmant($id);
        $dato['mant'] = $cmant['mant'];
        $crotura = $tb_estado->crotura($id);
        $dato['rotura'] = $crotura['rotura'];
        $csalva = $tb_estado->csalva($id);
        $dato['salva'] = $csalva['salva'];
        return view('paginas/informe', $dato);
    }
}
