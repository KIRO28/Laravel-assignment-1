<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('isAdmin'); // Drop the existing isAdmin column
            $table->enum('role', ['admin', 'author', 'user'])->default('user'); // Add role enum column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role'); // Drop the role column
            $table->boolean('isAdmin')->default(false); // Add back the isAdmin column
        });
    }
};
