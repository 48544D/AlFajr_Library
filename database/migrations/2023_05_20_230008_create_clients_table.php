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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table ->string('nom');
            $table ->string('prenom');
            $table ->string('telephone');
            $table ->string('email');
            $table->timestamps();
        });
    }
    /*-Id : int
-Nom : string
-Prenom : string
-Telephone : string
-email : string
*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
