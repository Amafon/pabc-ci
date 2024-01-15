<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDescriptionToArticles extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('articles', [
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => false,
                'after' => 'title',
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('articles', 'description');
    }
}
