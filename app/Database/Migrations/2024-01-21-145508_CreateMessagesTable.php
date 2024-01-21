<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'                  => 'INT',
                'null'                  => false,
                'auto_increment'        => true,
            ],
            'email' => [
                'type'                  => 'VARCHAR',
                'constraint'            => 50,
                'null'                  => false,
            ],
            'subject' => [
                'type'                  => 'VARCHAR',
                'constraint'            => 255,
                'null'                  => false,
            ],
            'senderFirstName' => [
                'type'                  => 'VARCHAR',
                'constraint'            => 150,
                'null'                  => false,
            ],
            'senderLastName' => [
                'type'                  => 'VARCHAR',
                'constraint'            => 150,
                'null'                  => false,
            ],
            'message' => [
                'type'                  => 'TEXT',
                'null'                  => false,
            ],
            'created_at' => [
                'type'                  => 'DATETIME',
                'null'                  => TRUE,
                'default'               => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type'                  => 'DATETIME',
                'null'                  => TRUE,
                'default'               => new RawSql('CURRENT_TIMESTAMP'),
            ]
        ]);

        $this->forge->addPrimaryKey("id");


        $this->forge->createTable("messages");
        $this->forge->addKey('created_at');
        $this->forge->processIndexes('messages');
    }

    public function down()
    {
        //
        $this->forge->dropTable("messages");
    }
}
