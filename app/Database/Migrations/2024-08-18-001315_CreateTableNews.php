<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableNews extends Migration
{
    protected $fields = [];
    public function up()
    {
        $this->fields = [
            'id'            => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'title'         => [
                'type'              => 'VARCHAR',
                'constraint'        => 128,
                'null'              => false,                
            ],
            'slug'          => [
                'type'              => 'VARCHAR',
                'constraint'        => 128,
                'null'              => false,
            ],
            'body'          => [
                'type'              => 'TEXT',
                'null'              => false,
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
        $this->forge->addField( $this->fields );
        $this->forge->addKey( 'id', true );
        $this->forge->createTable( 'news' );
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
