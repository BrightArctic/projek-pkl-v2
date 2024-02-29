<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama_barang');
            $table->integer('stock');
            $table->integer('anggaran');
            $table->string('scan')->default('default_value');
            $table->enum('kepemilikan', ['Milik Negara', 'Milik PNJ']);
            $table->string('serialnumber'); // Making serialnumber nullable.. at least for now
            $table->string('lokasi'); // Add the 'lokasi' column
            $table->string('gedung'); // Add the 'lokasi' column
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};
