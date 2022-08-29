<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\M_Responsable;
use App\Models\M_Dpto;
use App\Models\M_impresora;
use App\Models\M_modem;
use App\Models\M_router;
use App\Models\M_interruptor;
use App\Models\M_phone;
use App\Models\M_op_estado;


class RED extends Controller
{

    public function index()
    {
        $dptos = new M_Responsable();
        $dato['responsables'] = $dptos->orderBy('id')->findAll();
        $impresoras = new M_impresora();
        $dato['impresoras'] = $impresoras->printers();
        return view('paginas/printer', $dato);
    }

    public function reg_printer()
    {
        if (isset($_POST["btn-printer"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('printer')) {
                return redirect()->to(base_url() . '/printer')->with('alert', 'Datos incorrectos');
            } else {
                $impresora = new M_impresora();
                $tb_estado = new M_op_estado();
                $rows_report = $impresora->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/printer')->with("alert", "la impresora ya existe");
                } else {
                    $impresora->guardar($tipo, $t_repuesto, $multifuncional, $inventario, $marca, $modelo, $ns, $fk_responsable, $status, $status_inv);

                    /* Obtengo el ultimo ID */
                    $idmicro = $impresora->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Impresora";
                    $status_tec = $status;
                    $inventario = $status_inv;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/printer')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_printer()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $printer = new M_impresora();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $printer->update_status($id, $estado, $inventario);
            $equipo = "Impresora";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/printer')->with("success", "El registro fue actualizado");
        }
    }

    public function del_printer()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $printers = new M_impresora();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $printers->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/printer')->with("alert", "El registro tiene dependencias");
            } else {

                $equipo = "Impresora";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/printer')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function modem()
    {
        $dptos = new M_Responsable();
        $dato['responsables'] = $dptos->orderBy('id')->findAll();
        $dptos = new M_Dpto();
        $dato['areas'] = $dptos->orderBy('id')->findAll();
        $modems = new M_modem();
        $dato['modems'] = $modems->modems();
        return view('paginas/modem', $dato);
    }

    public function reg_modem()
    {
        if (isset($_POST["btn-modem"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            //print_r($_POST);
            if (!$this->validate('modem')) {
                return redirect()->to(base_url() . '/modem')->with('alert', 'Datos incorrectos');
            } else {
                $modem = new M_modem();
                $tb_estado = new M_op_estado();
                $rows_report = $modem->row_preport($inventario);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/modem')->with("alert", "El modem ya existe");
                } else {
                    $modem->guardar($inventario, $marca, $modelo, $status, $status_inv, $fk_responsable, $fk_dpto);

                    /* Obtengo el ultimo ID */
                    $idmicro = $modem->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Modem";
                    $status_tec = $status;
                    $inventario = $status_inv;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/modem')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_modem()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $modem = new M_modem();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $modem->update_status($id, $estado, $inventario);
            $equipo = "Modem";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/modem')->with("success", "El registro fue actualizado");
        }
    }

    public function del_modem()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $modem = new M_modem();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $modem->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/modem')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Modem";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/modem')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function router()
    {
        $dptos = new M_Responsable();
        $dato['responsables'] = $dptos->orderBy('id')->findAll();
        $dptos = new M_Dpto();
        $dato['areas'] = $dptos->orderBy('id')->findAll();
        $routers = new M_router();
        $dato['routers'] = $routers->routers();
        return view('paginas/router', $dato);
    }

    public function reg_router()
    {
        if (isset($_POST["btn-router"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('router')) {
                return redirect()->to(base_url() . '/router')->with('alert', 'Datos incorrectos');
            } else {
                $routers = new M_router();
                $tb_estado = new M_op_estado();
                $rows_report = $routers->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/router')->with("alert", "El router ya existe");
                } else {
                    $routers->guardar($inventario, $marca, $modelo, $ns, $status, $status_inv, $fk_responsable, $fk_dpto);

                    /* Obtengo el ultimo ID */
                    $idmicro = $routers->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Router";
                    $status_tec = $status;
                    $inventario = $status_inv;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/router')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_router()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $router = new M_router();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $router->update_status($id, $estado, $inventario);
            $equipo = "Router";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/router')->with("success", "El registro fue actualizado");
        }
    }

    public function del_router()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $router = new M_router();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $router->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/router')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Router";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/router')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function swit_ch()
    {
        $dptos = new M_Responsable();
        $dato['responsables'] = $dptos->orderBy('id')->findAll();
        $dptos = new M_Dpto();
        $dato['areas'] = $dptos->orderBy('id')->findAll();
        $interruptores = new M_interruptor();
        $dato['interruptores'] = $interruptores->interruptores();
        return view('paginas/switch', $dato);
    }

    public function reg_swit_ch()
    {
        if (isset($_POST["btn-switch"])) {

            $request = \Config\Services::request();

            extract($request->getPost());
            $interruptor = new M_interruptor();
            $tb_estado = new M_op_estado();

            if (!$this->validate('interruptor')) {
                return redirect()->to(base_url() . '/switch')->with('alert', 'Datos incorrectos');
            } else {
                $rows_report = $interruptor->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/switch')->with("alert", "El switch ya existe");
                } else {
                    $interruptor->guardar($inventario, $marca, $modelo, $ns, $programable, $status, $status_inv, $fk_responsable, $fk_dpto);

                    /* Obtengo el ultimo ID */
                    $idmicro = $interruptor->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Switch";
                    $status_tec = $status;
                    $inventario = $status_inv;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/switch')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_swit_ch()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $switch = new M_interruptor();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $switch->update_status($id, $estado, $inventario);
            $equipo = "Switch";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/switch')->with("success", "El registro fue actualizado");
        }
    }

    public function del_swit_ch()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $interruptor = new M_interruptor();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $interruptor->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/switch')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Switch";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/switch')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function telefono()
    {
        $dptos = new M_Responsable();
        $dato['responsables'] = $dptos->orderBy('id')->findAll();
        $dptos = new M_Dpto();
        $dato['areas'] = $dptos->orderBy('id')->findAll();
        $telefonos = new M_phone();
        $dato['telefonos'] = $telefonos->telefonos();
        return view('paginas/telefono', $dato);
    }

    public function reg_telefono()
    {
        if (isset($_POST["btn-telefono"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('telefono')) {
                return redirect()->to(base_url() . '/telefono')->with('alert', 'Datos incorrectos');
            } else {
                $telefonos = new M_phone();
                $tb_estado = new M_op_estado();

                $rows_report = $telefonos->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/telefono')->with("alert", "El telefono ya existe");
                } else {
                    $telefonos->guardar($alcance, $marca, $modelo, $inventario, $ns, $fk_dpto, $fk_responsable, $status, $status_inv);

                    /* Obtengo el ultimo ID */
                    $idmicro = $telefonos->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Telefono";
                    $status_tec = $status;
                    $inventario = $status_inv;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/telefono')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_telefono()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $phone = new M_phone();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $phone->update_status($id, $estado, $inventario);
            $equipo = "Telefono";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/telefono')->with("success", "El registro fue actualizado");
        }
    }

    public function del_telefono()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $telefono = new M_phone();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $telefono->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/telefono')->with("alert", "El registro tiene dependencias");
            } else {

                $equipo = "Telefono";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/telefono')->with("success", "El registro fue eliminado");
            }
        }
    }
}
