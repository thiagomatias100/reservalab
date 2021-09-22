<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Usuarios extends BaseController
{


    private $usuarioModel;
    public function __construct()
    {
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }
    public function index()
    {
        $data = [
            'titulo' => 'Sistema de Reserva de Laboratórios ufma Campus S.Cernarco',
            'foot' => 'UNIVERSIDADE FEDERAL DO MARANHÃO CAMPUS SÃO BERNARDO',
            'usuario' => $this->usuarioModel->findAll(),
        ];

        return view('/Admin/Usuarios/index', $data);
    }

    public function procurar()
    {

        if (!$this->request->isAJAX()) {
            exit("página não encontrada");
        }
        $usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));
        $retorno = [];
        foreach ($usuarios as $usuario):
            $data['id'] = $usuario->id; 
            $data['value'] = $usuario->nome;

            $retorno[] = $data;
        endforeach;

        return $this->response->setJSON($retorno);
    }

//mostra os dados dos usuários
    public function show($id = null){
        $usuario = $this->buscarUsuarioOu404($id);
        $data = [
            'titulo' => "Dados dos usários $usuario->nome",
            'usuario' => $usuario,
            //'email' => "$usuario->email",
            //'email' => "$usuario->ativo",
        ];
        //dd($usuario);

        return view('Admin/Usuarios/show',$data);
    }

//faz buscas de usuários
    public function buscarUsuarioOu404(int $id = null){
        if(!$id || !$usuario = $this->usuarioModel->where('id',$id)->first()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontamos o Usuário $id");
        }
        return $usuario;

    }


}
