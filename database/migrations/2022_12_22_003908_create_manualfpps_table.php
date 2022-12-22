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
        Schema::create('manualfpps', function (Blueprint $table) {
            $table->string('np2')->primary();
            $table->date('jt_manual')->nullable();
            $table->string('spv')->nullable();
            $table->string('kt')->nullable();
            $table->string('ang1')->nullable();
            $table->string('ang2')->nullable();
            $table->string('pic')->nullable();
            $table->integer('k1')->nullable();
            $table->integer('k2')->nullable();
            $table->integer('k3')->nullable();
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
        Schema::dropIfExists('manualfpps');
    }
};
