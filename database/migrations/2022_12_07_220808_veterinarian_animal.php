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
    { {
            Schema::create('veterinarian_animal', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('veterinarian_id')->unsigned();
                $table->bigInteger('animal_id')->unsigned();
                $table->timestamps();

                $table->foreign('veterinarian_id')->references('id')->on('veterinarians')->onUpdate('cascade')->onDelete('restrict');
                $table->foreign('animal_id')->references('id')->on('animals')->onUpdate('cascade')->onDelete('restrict');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veterinarian_animal');
    }
};
