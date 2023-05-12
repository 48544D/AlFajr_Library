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
        Schema::table('users', function (Blueprint $table) {
        
             $table->dropIfExists('name');
            $table->string('nom')->after('id');
            $table->string('prenom')->after('nom');
            $table->dropifExists('email');
            $table->dropifExists('email_verified_at');
            $table->enum('role', ['admin', 'personnel'])->default('admin')->after('prenom');
            $table->string('username')->unique()->after('role');
            $table->string('master_passwd')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['nom', 'prenom', 'role', 'username', 'master_passwd']);
        $table->string('email')->unique()->after('id');
        $table->timestamp('email_verified_at')->nullable()->after('email');
        $table->string('name')->after('id');
        });
    }
};
