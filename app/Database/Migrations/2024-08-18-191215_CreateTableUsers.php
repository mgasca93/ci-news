<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
    protected $fields = [];

    public function up()
    {
        $this->fields = [
            'id'            => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
                'auto_increment' => true,    
            ],
            'name'          => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'null'          => false,
            ],
            'last_name'     => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'null'          => false,
            ],
            'email'         => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'null'          => false,
                'unique'        => true,
            ],
            'password'      => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => false,
            ],
            'created_at'    => [
                'type'          => 'DATETIME',
                'null'          => false,
            ],
            'updated_at'    => [
                'type'          => 'DATETIME',
                'null'          => false,
            ],
        ];

        $this->forge->addField($this->fields);
        $this->forge->addKey( 'id', true );
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
