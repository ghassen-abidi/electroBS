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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->date('due_date');
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
        
            $table->unsignedBigInteger('appartement_id');
            
            $table->timestamps();
            $table->foreign('appartement_id')
                  ->references('id')
                  ->on('appartements')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
};
