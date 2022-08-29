<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Dpto;
use App\Models\M_Responsable;

class Responsable extends Controller
{

    public function index()
    {
        $dptos = new M_Dpto();
        $dato['areas'] = $dptos->orderBy('id')->findAll();
        $dptos = new M_Responsable();
        $dato['responsables'] = $dptos->orderBy('id')->findAll();
        return view('paginas/resp', $dato);
    }


    public function dpto_plus()
    {
        if (isset($_POST["dptoplus"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('departamento')) {
                return redirect()->to(base_url() . '/resp')->with('alert', 'Datos incorrectos');
            } else {
                $dptos = new M_Dpto();
                $rows_report = $dptos->row_preport($dpto);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/resp')->with("alert", "El departamento ya existe");
                } else {
                    $dptos->guardar($dpto);
                    return redirect()->to(base_url() . '/resp')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function resp_plus()
    {
        if (isset($_POST["resp_plus"])) {

            $request = \Config\Services::request();

            extract($request->getPost());

            if (!$this->validate('responsables')) {
                return redirect()->to(base_url() . '/resp')->with('alert', 'Datos incorrectos');
            } else {
                $responsable = new M_Responsable();
                $rows_report = $responsable->row_preport($nombre, $lastname, $cargo);
                if ($rows_report->getNumRows() > 0) {
                    return redirect()->to(base_url() . '/resp')->with("alert", "El responsable ya existe");
                } else {
                    $responsable->guardar($nombre, $lastname, $cargo);
                    return redirect()->to(base_url() . '/resp')->with('success', 'Datos guardados correctamente');
                }
            }
        }
    }

    public function deldpto()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $dptos = new M_Dpto();
            extract($request->getPost());
            $dptos->where('id', $id);
            $dptos->delete();
            return redirect()->to(base_url() . '/resp')->with("success", "El registro fue eliminado");
        }
    }

    public function delresp()
    {
        if (isset($_POST['btn-modal'])) {
            $request = \Config\Services::request();
            $responsable = new M_Responsable();
            extract($request->getPost());
            $responsable->where('id', $id);
            $responsable->delete();
            return redirect()->to(base_url() . '/resp')->with("success", "El registro fue eliminado");
        }
    }
}
