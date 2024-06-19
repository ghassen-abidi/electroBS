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
        Schema::create('immeubles', function (Blueprint $table) {
          
            $table->id(); 
            $table->string('nom');
            $table->string('adresse');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('superficie');
            $table->string('nombre_etage');
            $table->string('nombre_appartement');
            $table->string('user_id')->constrained()->onDelete('cascade');// Foreign key column
            $table->timestamps();
        });
    }

    // Define foreign key constraint
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('immeubles');
    }
};
