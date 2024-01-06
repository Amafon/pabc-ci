<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'=>[
                'type'                  =>'INT',
                'null'                  =>false,
                'auto_increment'        =>true,
            ],
            'title'=>[
                'type'                  =>'VARCHAR',
                'constraint'            => 100,
                'null'                  =>false,
            ],
            'content'=>[
                'type'                  =>'TEXT',
                'null'                  =>false,
            ],
            'user_id'=>[
                'type'                  =>'INT',
                'null'                  =>false,
            ],
            'category_id'=>[
                'type'                  =>'INT',
                'null'                  =>false,
            ],
            'tag'=>[
                'type'                  =>'VARCHAR',
                'constraint'            => 20,
                'null'                  =>false,
            ],
            'created_at'=>[
                'type'                  =>'DATETIME',
                'null'                  =>TRUE,
                'default'               => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at'=>[
                'type'                  =>'DATETIME',
                'null'                  =>TRUE,
                'default'               => new RawSql('CURRENT_TIMESTAMP'),
            ]
        ]);

        $this->forge->addPrimaryKey("id");
        
        
        $this->forge->createTable("articles");
        $this->forge->addKey('created_at');
        $this->forge->processIndexes('articles');
    }
    
    public function down()
    {
        //
        $this->forge->dropTable("articles");
    }
}
