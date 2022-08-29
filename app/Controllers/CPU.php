<?php
namespace App\Controllers;
use App\Models\M_Dpto;
use App\Models\M_Responsable;
use App\Models\M_cpu;
use App\Models\M_placa;
use App\Models\M_micro;
use App\Models\M_ram;
use App\Models\M_fuente;
use App\Models\M_disco;
use App\Models\M_cd;
use App\Models\M_teclado;
use App\Models\M_raton;
use App\Models\M_speaker;
use App\Models\M_ups;
use App\Models\M_monitor;
use App\Models\M_op_estado;
use CodeIgniter\Controller;

class CPU extends Controller
{
    public function index()
    {
        $dptos = new M_Dpto();
        $dato['areas'] = $dptos->orderBy('id')->findAll();
        $responsable = new M_Responsable();
        $dato['responsables'] = $responsable->orderBy('id')->findAll();
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->unidadCentral();
        return view('paginas/cpu', $dato);
    }

    public function reg_cpu()
    {
        if (isset($_POST["btn-cpu"])) {

            $request = \Config\Services::request();

            extract($request->getPost());
            $fecha = strtotime($fecha_inicio);
            if (!$this->validate('cpu')) {
                return redirect()->to(base_url() . '/cpu')->with('alert', 'Datos incorrectos');
            } else {
                $cpu = new M_cpu();
                $rows_report = $cpu->row_preport($inventario);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/cpu')->with("alert", "La CPU ya existe");
                } else {
                    $cpu->guardar($nombrepc, $ip, $mac, $inventario, $fk_dpto, $sello_seguridad, $fecha, $marca, $modelo, $so, $fk_responsable);
                    return redirect()->to(base_url() . '/cpu')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function del_cpu()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $pcs = new M_cpu();
            extract($request->getPost());
            $action = $pcs->eliminar($id);
            if ($action == false) {
                return redirect()->to(base_url() . '/cpu')->with("alert", "El registro tiene dependencias");
            } else
                return redirect()->to(base_url() . '/cpu')->with("success", "El registro fue eliminado");
        }
    }

    public function placa()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $placas = new M_placa();
        $dato['placas'] = $placas->placas();
        return view('paginas/placa', $dato);
    }
    public function reg_placa()
    {
        if (isset($_POST["btn-placa"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('placa')) {
                return redirect()->to(base_url() . '/placa')->with('alert', 'Datos incorrectos');
            } else {
                $placas = new M_placa();
                $tb_estado = new M_op_estado();
                $rows_report = $placas->row_preport($numserie);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/placa')->with("alert", "La placamadre ya existe");
                } else {
                    $placas->guardar($fk_pc, $socket, $marca, $modelo, $numserie, $status_tec);

                    /* Obtengo el ultimo ID */
                    $idplaca = $placas->getID();
                    $idequipo = $idplaca['id'];
                    $equipo = "placamadre";
                    $fecha = time();
                    $tb_estado->save_placa($idequipo, $equipo, $status_tec, $fecha);
                    return redirect()->to(base_url() . '/placa')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function del_placa()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $placas = new M_placa();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $placas->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/placa')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "placamadre";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/placa')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function upplaca()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $placa = new M_placa();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $placa->update_status($id, $estado);
            $equipo = "placamadre";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_st($idRow, $estado, $fecha);
            return redirect()->to(base_url() . '/placa')->with("success", "El registro fue actualizado");
        }
    }

    public function micro()
    {
        $placass = new M_placa();
        $dato['placas'] = $placass->orderBy('id')->findAll();
        $micros = new M_micro();
        $dato['micros'] = $micros->micros();
        return view('paginas/micro', $dato);
    }

    public function reg_micro()
    {
        if (isset($_POST["btn-micro"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('micro')) {
                return redirect()->to(base_url() . '/micro')->with('alert', 'Datos incorrectos');
            } else {
                $micros = new M_micro();
                $tb_estado = new M_op_estado();
                $rows_report = $micros->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/micro')->with("alert", "El microprocedador ya existe");
                } else {
                    $micros->guardar($fk_placa, $velocidad, $cantnucleos, $marca, $modelo, $ns, $status_tecnico);
                    /* Obtengo el ultimo ID */
                    $idmicro = $micros->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "microprocesador";
                    $status_tec = $status_tecnico;
                    $fecha = time();
                    $tb_estado->save_placa($idequipo, $equipo, $status_tec, $fecha);
                    return redirect()->to(base_url() . '/micro')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_micro()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $micro = new M_micro();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $micro->update_status($id, $estado);
            $equipo = "microprocesador";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_st($idRow, $estado, $fecha);
            return redirect()->to(base_url() . '/micro')->with("success", "El registro fue actualizado");
        }
    }

    public function del_micro()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $micro = new M_micro();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $micro->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/micro')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "microprocesador";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/micro')->with("success", "El registro fue eliminado");
            }
        }
    }
    public function mram()
    {
        $placass = new M_placa();
        $dato['placas'] = $placass->orderBy('id')->findAll();
        $rams = new M_ram();
        $dato['rams'] = $rams->rams();
        return view('paginas/mram', $dato);
    }

    public function reg_ram()
    {
        if (isset($_POST["btn-ram"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('ram')) {
                return redirect()->to(base_url() . '/mram')->with('alert', 'Datos incorrectos');
            } else {
                $rams = new M_ram();
                $tb_estado = new M_op_estado();
                $rows_report = $rams->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/mram')->with("alert", "La memoria RAM ya existe");
                } else {
                    $rams->guardar($fk_placa, $tipo, $capacidad, $marca, $modelo, $ns, $status);
                    /* Obtengo el ultimo ID */
                    $idmicro = $rams->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Memoria Ram";
                    $status_tec = $status;
                    $fecha = time();
                    $tb_estado->save_placa($idequipo, $equipo, $status_tec, $fecha);
                    return redirect()->to(base_url() . '/mram')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_ram()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $ram = new M_ram();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $ram->update_status($id, $estado);
            $equipo = "Memoria Ram";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_st($idRow, $estado, $fecha);
            return redirect()->to(base_url() . '/mram')->with("success", "El registro fue actualizado");
        }
    }

    public function del_ram()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $ram = new M_ram();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $ram->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/mram')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Memoria Ram";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/mram')->with("success", "El registro fue eliminado");
            }
        }
    }
    public function fuente()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $fuente = new M_fuente();
        $dato['fuentes'] = $fuente->fuentes();
        return view('paginas/fuente', $dato);
    }

    public function reg_fuente()
    {
        if (isset($_POST["btn-fuente"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('fuente')) {
                return redirect()->to(base_url() . '/fuente')->with('alert', 'Datos incorrectos');
            } else {
                $fuentes = new M_fuente();
                $tb_estado = new M_op_estado();
                $rows_report = $fuentes->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/fuente')->with("alert", "La memoria RAM ya existe");
                } else {
                    $fuentes->guardar($fk_pc, $potencia, $marca, $model, $ns, $status);
                    /* Obtengo el ultimo ID */
                    $idmicro = $fuentes->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Fuente interna";
                    $status_tec = $status;
                    $fecha = time();
                    $tb_estado->save_placa($idequipo, $equipo, $status_tec, $fecha);
                    return redirect()->to(base_url() . '/fuente')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_fuente()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $fuente = new M_fuente();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $fuente->update_status($id, $estado);
            $equipo = "Fuente interna";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_st($idRow, $estado, $fecha);
            return redirect()->to(base_url() . '/fuente')->with("success", "El registro fue actualizado");
        }
    }

    public function del_fuente()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $fuente = new M_fuente();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $fuente->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/fuente')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Fuente interna";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/fuente')->with("success", "El registro fue eliminado");
            }
        }
    }
    public function disco()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $discos = new M_disco();
        $dato['discos'] = $discos->discos();
        return view('paginas/disco', $dato);
    }

    public function reg_disco()
    {
        if (isset($_POST["btn-disco"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('disco')) {
                return redirect()->to(base_url() . '/disco')->with('alert', 'Datos incorrectos');
            } else {
                $discos = new M_disco();
                $tb_estado = new M_op_estado();
                $rows_report = $discos->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/disco')->with("alert", "El disco duro ya existe");
                } else {
                    $discos->guardar($fk_pc, $capacidad, $marca, $modelo, $ns, $status);

                    /* Obtengo el ultimo ID */
                    $idmicro = $discos->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Disco duro";
                    $status_tec = $status;
                    $fecha = time();
                    $tb_estado->save_placa($idequipo, $equipo, $status_tec, $fecha);
                    return redirect()->to(base_url() . '/disco')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_disco()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $disco = new M_disco();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $disco->update_status($id, $estado);
            $equipo = "Disco duro";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_st($idRow, $estado, $fecha);
            return redirect()->to(base_url() . '/disco')->with("success", "El registro fue actualizado");
        }
    }

    public function del_disco()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $disco = new M_disco();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $disco->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/disco')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Disco duro";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/disco')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function cd()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $cd = new M_cd();
        $dato['cds'] = $cd->cds();
        return view('paginas/cd', $dato);
    }

    public function reg_cd()
    {
        if (isset($_POST["btn-cd"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('cd')) {
                return redirect()->to(base_url() . '/cd')->with('alert', 'Datos incorrectos');
            } else {
                $cd = new M_cd();
                $tb_estado = new M_op_estado();
                $rows_report = $cd->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/cd')->with("alert", "El lector de discos compactos ya existe");
                } else {
                    $cd->guardar($fk_pc, $tipo, $marca, $modelo, $ns, $status);

                    /* Obtengo el ultimo ID */
                    $idmicro = $cd->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Lector CD/DVD";
                    $status_tec = $status;
                    $fecha = time();
                    $tb_estado->save_placa($idequipo, $equipo, $status_tec, $fecha);
                    return redirect()->to(base_url() . '/cd')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_cd()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $cd = new M_cd();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $cd->update_status($id, $estado);
            $equipo = "Lector CD/DVD";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_st($idRow, $estado, $fecha);
            return redirect()->to(base_url() . '/cd')->with("success", "El registro fue actualizado");
        }
    }

    public function del_cd()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $cds = new M_cd();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $cds->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/cd')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Lector CD/DVD";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/cd')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function teclado()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $teclados = new M_teclado();
        $dato['teclados'] = $teclados->teclados();
        return view('paginas/teclado', $dato);
    }

    public function reg_teclado()
    {
        if (isset($_POST["btn-teclado"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('teclado')) {
                return redirect()->to(base_url() . '/teclado')->with('alert', 'Datos incorrectos');
            } else {
                $teclados = new M_teclado();
                $tb_estado = new M_op_estado();
                $rows_report = $teclados->row_preport($inventario);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/teclado')->with("alert", "El teclado ya existe");
                } else {
                    $fecha = strtotime($fecha_exp);
                    $teclados->guardar($fk_pc, $interfaz, $inventario, $marca, $modelo, $fecha, $status, $status_inventario);

                    /* Obtengo el ultimo ID */
                    $idmicro = $teclados->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Teclado";
                    $status_tec = $status;
                    $inventario = $status_inventario;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/teclado')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_teclado()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $teclado = new M_teclado();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $teclado->update_status($id, $estado, $inventario);
            $equipo = "Teclado";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/teclado')->with("success", "El registro fue actualizado");
        }
    }

    public function del_teclado()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $teclado = new M_teclado();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $teclado->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/teclado')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Teclado";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/teclado')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function mouse()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $ratones = new M_raton();
        $dato['ratones'] = $ratones->ratones();
        return view('paginas/mouse', $dato);
    }

    public function reg_mouse()
    {
        if (isset($_POST["btn-mouse"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('mouse')) {
                return redirect()->to(base_url() . '/mouse')->with('alert', 'Datos incorrectos');
            } else {
                $raton = new M_raton();
                $tb_estado = new M_op_estado();
                $rows_report = $raton->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/mouse')->with("alert", "El mouse ya existe");
                } else {
                    $fecha = strtotime($fecha_exp);
                    $raton->guardar($fk_pc, $interfaz, $inventario, $marca, $modelo, $ns, $fecha, $status, $status_inv);

                    /* Obtengo el ultimo ID */
                    $idmicro = $raton->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Mouse";
                    $status_tec = $status;
                    $inventario = $status_inv;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/mouse')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_mouse()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $mouse = new M_raton();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $mouse->update_status($id, $estado, $inventario);
            $equipo = "Mouse";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/mouse')->with("success", "El registro fue actualizado");
        }
    }

    public function del_mouse()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $raton = new M_raton();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $raton->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/mouse')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Mouse";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/mouse')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function bocina()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $bocinas = new M_speaker();
        $dato['bocinas'] = $bocinas->bocinas();
        return view('paginas/bocina', $dato);
    }

    public function reg_bocina()
    {
        if (isset($_POST["btn-bocina"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('bocina')) {
                return redirect()->to(base_url() . '/bocina')->with('alert', 'Datos incorrectos');
            } else {
                $bocina = new M_speaker();
                $tb_estado = new M_op_estado();
                $rows_report = $bocina->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/bocina')->with("alert", "El periférico ya existe");
                } else {
                    $fecha_inicia = strtotime($fecha);
                    $bocina->guardar($fk_pc, $inventario, $marca, $modelo, $ns, $fecha_inicia, $status, $status_inv);

                    /* Obtengo el ultimo ID */
                    $idmicro = $bocina->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Speaker";
                    $status_tec = $status;
                    $inventario = $status_inv;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/bocina')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_bocina()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $speaker = new M_speaker();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $speaker->update_status($id, $estado, $inventario);
            $equipo = "Speaker";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/bocina')->with("success", "El registro fue actualizado");
        }
    }

    public function del_bocina()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $bocina = new M_speaker();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $bocina->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/bocina')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Speaker";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/bocina')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function ups()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $ups = new M_ups();
        $dato['baterias'] = $ups->ups();
        return view('paginas/ups', $dato);
    }

    public function reg_ups()
    {
        if (isset($_POST["btn-ups"])) {

            $request = \Config\Services::request();

            extract($request->getPost());
            $ups = new M_ups();
            $tb_estado = new M_op_estado();

            if (!$this->validate('ups')) {
                return redirect()->to(base_url() . '/ups')->with('alert', 'Datos incorrectos');
            } else {
                $rows_report = $ups->row_preport($ns);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/ups')->with("alert", "La ups ya existe");
                } else {
                    $fecha = strtotime($date);
                    $ups->guardar($fk_pc, $inventario, $marca, $modelo, $ns, $fecha, $status, $status_inv);

                    /* Obtengo el ultimo ID */
                    $idmicro = $ups->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "UPS";
                    $status_tec = $status;
                    $inventario = $status_inv;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/ups')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_ups()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $ups = new M_ups();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $ups->update_status($id, $estado, $inventario);
            $equipo = "UPS";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/ups')->with("success", "El registro fue actualizado");
        }
    }

    public function del_ups()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $bateria = new M_ups();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $accion = $bateria->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/ups')->with("alert", "El registro tiene dependencias");
            } else {

                $equipo = "UPS";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/ups')->with("success", "El registro fue eliminado");
            }
        }
    }

    public function monitor()
    {
        $cpus = new M_cpu();
        $dato['cpus'] = $cpus->orderBy('id')->findAll();
        $monitor = new M_monitor();
        $dato['monitores'] = $monitor->monitores();
        return view('paginas/monitor', $dato);
    }

    public function reg_monitor()
    {
        if (isset($_POST["btn-monitor"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('monitor')) {
                return redirect()->to(base_url() . '/monitor')->with('alert', 'Datos incorrectos');
            } else {
                $monitor = new M_monitor();
                $tb_estado = new M_op_estado();
                $rows_report = $monitor->row_preport($inventario);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/monitor')->with("alert", "El monitor ya existe");
                } else {
                    $fecha_explotacion = strtotime($date);
                    $monitor->guardar($fk_pc, $tipo, $pulgadas, $inventario, $marca, $modelo, $ns, $fecha_explotacion, $status, $status_inventario);

                    /* Obtengo el ultimo ID */
                    $idmicro = $monitor->getID();
                    $idequipo = $idmicro['id'];
                    $equipo = "Monitor";
                    $status_tec = $status;
                    $inventario = $status_inventario;
                    $date = time();
                    $tb_estado->save_inv($idequipo, $equipo, $status_tec, $date, $inventario);
                    return redirect()->to(base_url() . '/monitor')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function up_monitor()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $monitor = new M_monitor();
            $tb_estado = new M_op_estado();
            extract($request->getPost());
            $fecha = strtotime($date_status);
            $monitor->update_status($id, $estado, $inventario);
            $equipo = "Monitor";
            $idtic = $tb_estado->selectID($id, $equipo);
            $idRow = $idtic['id'];
            $tb_estado->update_inv($idRow, $estado, $fecha, $inventario);
            return redirect()->to(base_url() . '/monitor')->with("success", "El registro fue actualizado");
        }
    }

    public function del_monitor()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $monitores = new M_monitor();
            $tb_estado = new M_op_estado();            
            extract($request->getPost());
            $accion = $monitores->eliminar($id);
            if ($accion == false) {
                return redirect()->to(base_url() . '/monitor')->with("alert", "El registro tiene dependencias");
            } else {
                $equipo = "Monitor";
                $idtic = $tb_estado->selectID($id, $equipo);
                $idRow = $idtic['id'];
                $tb_estado->eliminar($idRow);
                return redirect()->to(base_url() . '/monitor')->with("success", "El registro fue eliminado");
            }
        }
    }
}
