<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Responsable;
use App\Models\M_Dpto;
use App\Models\M_cpu;
use App\Models\M_soft;
use App\Models\M_virus;
use App\Models\M_deficiencia;
use App\Models\M_incidencia;
use App\Models\M_inspeccion;
use App\Models\M_mantenimiento;
use App\Models\M_movimiento;
use App\Models\M_rotura;
use App\Models\M_salva;

class SI extends Controller
{

    public function index()
    {
        $dptos = new M_cpu();
        $dato['cpus'] = $dptos->orderBy('id')->findAll();
        $soft = new M_soft();
        $dato['apps'] = $soft->softs();
        return view('paginas/software', $dato);
    }

    public function reg_soft()
    {
        if (isset($_POST["btn-soft"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('software')) {
                return redirect()->to(base_url() . '/soft')->with('alert', 'Datos incorrectos');
            } else {
                $soft = new M_soft();
                $soft->guardar($fk_pc, $name_soft, $version, $fabricante);
                return redirect()->to(base_url() . '/soft')->with('success', 'Datos guardados correctamente');
            }
        }
    }

    public function del_soft()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $software = new M_soft();
            extract($request->getPost());
            $accion = $software->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/soft')->with("alert", "El registro tiene dependencias");
            } else
                return redirect()->to(base_url() . '/soft')->with("success", "El registro fue eliminado");
        }
    }

    public function virus()
    {
        $dptos = new M_cpu();
        $dato['cpus'] = $dptos->orderBy('id')->findAll();
        $virus = new M_virus();
        $dato['malwares'] = $virus->virus();
        return view('paginas/virus', $dato);
    }

    public function reg_virus()
    {
        if (isset($_POST["btn-virus"])) {
            $request = \Config\Services::request();
            extract($request->getPost());
            if (!$this->validate('virus')) {
                return redirect()->to(base_url() . '/virus')->with('alert', 'Datos incorrectos');
            } else {
                $viru = new M_virus();
                $fecha = strtotime($date);
                $rows_report = $viru->row_preport($fk_pc, $fecha);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/virus')->with("alert", "El registro ya fue reportado");
                } else {
                    $fecha = strtotime($date);
                    $viru->guardar($fk_pc, $fecha, $tipo_virus, $descripcion, $efectos_negativo, $accion, $solucionado);
                    return redirect()->to(base_url() . '/virus')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function del_virus()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $malware = new M_virus();
            extract($request->getPost());
            $accion = $malware->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/virus')->with("alert", "El registro tiene dependencias");
            } else
                return redirect()->to(base_url() . '/virus')->with("success", "El registro fue eliminado");
        }
    }

    public function inspeccion()
    {
        $dptos = new M_Dpto();
        $dato['dptos'] = $dptos->orderBy('id')->findAll();
        $responsable = new M_Responsable();
        $dato['responsables'] = $responsable->orderBy('id')->findAll();        
        $inspecciones = new M_inspeccion();
        $dato['inspecciones'] = $inspecciones->inspecciones();
        return view('paginas/inspeccion', $dato);
    }

    public function reg_inspeccion()
    {
        if (isset($_POST["btn-inspeccion"])) {
            $request = \Config\Services::request();
            extract($request->getPost());
            if (!$this->validate('inspeccion')) {
                return redirect()->to(base_url() . '/inspeccion')->with('alert', 'Datos incorrectos');
            } else {
                $defi = new M_inspeccion();
                $fecha_inspeccion = strtotime($date);
                $rows_report = $defi->row_preport($fecha_inspeccion, $fk_responsable);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/inspeccion')->with("alert", "El registro ya fue reportado");
                } else {
                    $defi->guardar($fecha_inspeccion, $fk_responsable, $fk_dpto, $accion);
                    return redirect()->to(base_url() . '/inspeccion')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function del_inspeccion()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $inspeccion = new M_inspeccion();
            extract($request->getPost());
            $accion = $inspeccion->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/inspeccion')->with("alert", "El registro tiene dependencias");
            } else
                return redirect()->to(base_url() . '/inspeccion')->with("success", "El registro fue eliminado");
        }
    }

    public function incidencia()
    {
        $dptos = new M_cpu();
        $dato['cpus'] = $dptos->orderBy('id')->findAll();
        $deficiencias = new M_deficiencia();
        $dato['deficiencias'] = $deficiencias->orderBy('id')->findAll();
        $incidencias = new M_incidencia();
        $dato['incidencias'] = $incidencias->incidencias();
        return view('paginas/inside', $dato);
    }

    public function reg_incidencia()
    {
        if (isset($_POST["btn-incidencia"])) {
            $request = \Config\Services::request();
            $incide = new M_incidencia();
            extract($request->getPost());
            if (!$this->validate('incidencia')) {
                return redirect()->to(base_url() . '/incidencia')->with('alert', 'Datos incorrectos');
            } else {
                $fecha = strtotime($date);
                $incide->guardar($fk_pc, $fecha, $incidencia, $solucionada, $acciones);
                return redirect()->to(base_url() . '/incidencia')->with('success', 'Datos guardados correctamente');
            }
        }
    }

    public function up_incidencia()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $incide = new M_incidencia();
            extract($request->getPost());
            $fecha_solucion = strtotime($date);
            $incide->update_sol($id, $solucionada, $acciones, $fecha_solucion);            
            return redirect()->to(base_url() . '/incidencia')->with("success", "El registro fue actualizado");
        }
    }
    public function del_incidencia()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $incidencia = new M_incidencia();
            extract($request->getPost());
            $accion = $incidencia->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/incidencia')->with("alert", "El registro tiene dependencias");
            } else
                return redirect()->to(base_url() . '/incidencia')->with("success", "El registro fue eliminado");
        }
    }

    public function mantenimiento()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $mantenimientos = new M_mantenimiento();
        $dato['mantenimientos'] = $mantenimientos->mantenimientos();
        return view('paginas/mantenimiento', $dato);
    }

    public function reg_mantenimiento()
    {
        if (isset($_POST["btn-mantenimiento"])) {
            $request = \Config\Services::request();
            extract($request->getPost());
            $mant = new M_mantenimiento();
            $fecha = strtotime($date);
            $mant->guardar($fk_pc, $fecha, $observacion);
            return redirect()->to(base_url() . '/mantenimiento')->with('success', 'Datos guardados correctamente');
        }
    }

    public function del_mantenimiento()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $mant = new M_mantenimiento();
            extract($request->getPost());
            $accion = $mant->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/mantenimiento')->with("alert", "El registro tiene dependencias");
            } else
                return redirect()->to(base_url() . '/mantenimiento')->with("success", "El registro fue eliminado");
        }
    }

    public function movimiento()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $movimientos = new M_movimiento();
        $dato['movs'] = $movimientos->movimientos();
        return view('paginas/movimiento', $dato);
    }

    public function reg_movimiento()
    {
        if (isset($_POST["btn-movimiento"])) {
            $request = \Config\Services::request();
            extract($request->getPost());
            $mov = new M_movimiento();
            $fecha = strtotime($date);
            $mov->guardar($fk_pc, $fecha, $motivo, $tipo);
            return redirect()->to(base_url() . '/movimiento')->with('success', 'Datos guardados correctamente');
        }
    }

    public function del_movimiento()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $mov = new M_movimiento();
            extract($request->getPost());
            $accion = $mov->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/movimiento')->with("alert", "El registro tiene dependencias");
            } else
                return redirect()->to(base_url() . '/movimiento')->with("success", "El registro fue eliminado");
        }
    }

    public function rotura()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $roturas = new M_rotura();
        $dato['roturas'] = $roturas->roturas();
        return view('paginas/rotura', $dato);
    }

    public function reg_rotura()
    {
        if (isset($_POST["btn-rotura"])) {
            $request = \Config\Services::request();
            extract($request->getPost());
            $rotura = new M_rotura();
            $fecha = strtotime($date);
            $rotura->guardar($fk_pc, $fecha, $tipo_rotura, $observ);
            return redirect()->to(base_url() . '/rotura')->with('success', 'Datos guardados correctamente');
        }
    }

    public function del_rotura()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $rot = new M_rotura();
            extract($request->getPost());
            $accion = $rot->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/rotura')->with("alert", "El registro tiene dependencias");
            } else
                return redirect()->to(base_url() . '/rotura')->with("success", "El registro fue eliminado");
        }
    }

    public function rot_upfecha()
    {
        if (isset($_POST["btn-modal"])) {
            $request = \Config\Services::request();
            $r = new M_rotura();

            extract($request->getPost());

            $fecha_solucion = strtotime($datep);

            $r->update_date($id, $fecha_solucion, $observ);

            return redirect()->to(base_url() . '/rotura')->with("success", "La fecha de soluci&oacute;n de la rotura fue actualizado exitosamente");
        }
    }

    public function salva()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $salvas = new M_salva();
        $dato['salvas'] = $salvas->salvas();
        return view('paginas/salva', $dato);
    }

    public function reg_salva()
    {
        if (isset($_POST["btn-salva"])) {
            $request = \Config\Services::request();
            extract($request->getPost());
            $salva = new M_salva();
            $fecha = strtotime($date);
            $salva->guardar($fk_pc, $fecha, $name, $observacion);
            return redirect()->to(base_url() . '/salva')->with('success', 'Datos guardados correctamente');
        }
    }

    public function del_salva()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $salva = new M_salva();
            extract($request->getPost());
            $accion = $salva->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/salva')->with("alert", "El registro tiene dependencias");
            } else
                return redirect()->to(base_url() . '/salva')->with("success", "El registro fue eliminado");
        }
    }
}
