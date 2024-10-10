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
       
        DB::table('roles')->insert([
            [
                'name' => "Super Admin",
                'created_at' => "now()",
                'updated_at' => "now()"
            ]
            ]);

        DB::table('roles')->insert([
            [
                'name' => "Admin",
                'created_at' => "now()",
                'updated_at' => "now()"
            ]
            ]);

        DB::table('roles')->insert([
            [
                'name' => "User",
                'created_at' => "now()",
                'updated_at' => "now()"
            ]
            ]);
            //  DB::table('roles')->insert([
            // [
            //     'name' => "keith",
            //     'email' => "keith@gmail.com",
            //     'password' => Hash::make("12345678"), // Hash the password directly
            //     'role' => "admin",
            //     'created_at' => "now()",
            //     'updated_at' => "now()"
            // ]
            // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
};
