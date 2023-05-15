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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('price');
            $table->string('image');
            $table->string('category');
            $table->string('stock');
            $table->timestamps();
        });
    }
    public function after($migrationName)
    {
        if ($migrationName === '2023_04_11_112444_create_sub_categories_table.php') {
            return true;
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
