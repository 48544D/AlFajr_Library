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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('category');
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade');
            $table->string('reference')->after('id');
            $table->boolean('stock')->default(true)->change();
        });
    }
    public function after($migrationName)
    {
        if ($migrationName === '2023_04_11_112607_create_categories_table.php') {
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
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
