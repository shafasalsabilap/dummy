<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_polis' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'tanggal_bayar' => [
                'type' => 'DATE',
            ],
            'jumlah_bayar' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],
        ]);

        $this->forge->addKey('id', true); // Primary Key

        // Foreign Key
        $this->forge->addForeignKey('id_polis', 'polis', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
