<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriaTabelaUsuarios extends Migration
{
    public function up()
    {


        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null'=> false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null'=> false,
                'unique' => true,           
             ],
            'matricula' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null'=> false,
                'unique' => true,
            ],
            'telefone' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null'=> false,
            ],
            'is_usuario' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default'=>false,
            ],
            'ativo' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default'=>false,
            ],
            'ativacao_hash' => [
                'type' => 'VARCHAR',
                'null' =>  true,
                'constraint' => '64',
                'unique' => true,
            ],
            'reset_hash' => [
                'type' => 'VARCHAR',
                'null' =>  true,
                'constraint' => '255',
            ],
            'reset_expira_em' => [
                'type' => 'DATETIME',
                'null' =>  true,
                'default'=>null,
            ],
            'criado_em' => [
                'type' => 'DATETIME',
                'null' =>  true,
                'default'=>null,
            ],
            'atualizado_em' => [
                'type' => 'DATETIME',
                'null' =>  true,
                'default'=>null,
            ],
            'deletado_em' => [
                'type' => 'DATETIME',
                'null' =>  true,
                'default'=>null,
            ],            
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
