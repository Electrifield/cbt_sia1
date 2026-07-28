<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('username')->nullable()->after('email');
            $table->string('phone')->nullable()->after('username');
            $table->string('is_staff')->default(false)->after('phone');
            $table->string('photo_path')->nullable()->after('is_staff');
            // ubah kolom email menjadi nullable dan unique
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //rollback coloumns ang ditambahkan
            $table->dropColumn('username', 'phone', 'is_staff');
        });
    }
};
