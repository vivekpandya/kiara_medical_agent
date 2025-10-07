<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLivekitRoomsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'room_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'room_sid' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'max_participants' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 10,
            ],
            'current_participants' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive', 'ended'],
                'default' => 'active',
            ],
            'metadata' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('room_name');
        $this->forge->addKey('created_by');
        $this->forge->addKey('status');
        $this->forge->addKey('created_at');

        $this->forge->createTable('livekit_rooms');
    }

    public function down()
    {
        $this->forge->dropTable('livekit_rooms');
    }
}
