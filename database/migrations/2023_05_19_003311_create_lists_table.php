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
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table ->string('Nom_doc');
            $table ->string('Emplac_fich');
            $table ->string('Etablissement');
            $table ->string('Niveau');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /*
    -Id : int
-Nom_doc:   string
-Emplac_fich : string
-Date_dajout: datetime
-Etablissement : string
-Niveau: string
(FK Id_Client)

    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists');
    }
};
