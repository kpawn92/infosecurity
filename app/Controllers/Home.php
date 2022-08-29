<?php

namespace App\Controllers;

use App\Models\Login;

class Home extends BaseController
{
    public function index()
    {
        return view('paginas/login');
    }

    
    public function login()
    {
        $log = new Login();
        $request = \Config\Services::request();
        extract($request->getPost());

        $datosUsuario = $log->getUser(['user' => $user]);

        if (count($datosUsuario) > 0 && password_verify($password, $datosUsuario[0]['password'])) {
            $data = [
                "id" => $datosUsuario[0]['id'],
                "user" => $datosUsuario[0]['user'],
                "type" => $datosUsuario[0]['type'],
                "name" => $datosUsuario[0]['name']
            ];
            $session = session();
            $session->set($data);
            return redirect()->to(base_url() . '/dash');
        } else {
            return redirect()->to(base_url() . '/')->with('message', 'AUTENTICACION INCORRECTA');
        }
    }

    

    public function verypass()
    {
        $login = new Login();
        $request = \Config\Services::request();
        extract($request->getPost());
        $login->actualizar($id, $password);
        return redirect()->to(base_url() . '/dash');
    }

    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url() . '/');
    }
}
