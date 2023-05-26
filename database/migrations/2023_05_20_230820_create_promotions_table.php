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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->float('prix_prom');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('reference')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /*-Id : int
-Prix_prom : float
(FK Id_Produit)
*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
};
