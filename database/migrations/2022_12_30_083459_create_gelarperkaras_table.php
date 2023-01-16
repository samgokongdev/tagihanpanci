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
        Schema::create('gelarperkaras', function (Blueprint $table) {
            $table->id();
            $table->string('np2')->nullable();
            $table->dateTime('tgl_gp')->nullable();
            $table->string('kasi')->nullable();
            $table->string('ar')->nullable();
            $table->string('penilai')->nullable();
            $table->string('penyuluh')->nullable();
            $table->string('notulen')->nullable();
            $table->string('pic')->nullable();
            $table->dateTime('tgl_gp_ubah')->nullable();
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
        Schema::dropIfExists('gelarperkaras');
    }
};
