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
        Schema::create('appartements', function (Blueprint $table) {
        
            $table->id();
            $table->string('numero');
            $table->string('description');
            $table->string('prix');
            $table->string('etage');
            $table->string('parking');
            


             $table->unsignedBigInteger('immeubles_id');

            $table->foreign('immeubles_id')
                  ->references('id')
                  ->on('immeubles')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('appartements');
    }
};
