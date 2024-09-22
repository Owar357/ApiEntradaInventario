<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_entradas', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->integer('cantidad');
            $table->string('descripcion',255);
            $table->decimal('precio_unitario',10,2);
            $table->decimal('impuesto',10,2);
            $table->decimal('total',10,2);
            $table->unsignedBigInteger('registro_entrada_id');
            $table->foreign('registro_entrada_id')->references('id')->on('registro_entradas');
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_entradas');
    }
};
