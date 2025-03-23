<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Aggiungi la colonna is_admin se non esiste già
        if (!Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_admin')->after('email')->nullable()->default(false);
            });
        }

        // Crea gli utenti admin solo se non esistono già
        if (!User::where('email', 'admin@theaulabpost.it')->exists()) {
            User::create([
                'name' => 'GeppeSkywalker',
                'email' => 'admin@theaulabpost.it',
                'password' => bcrypt('12345678'),
                'is_admin' => true,
            ]);
        }

        if (!User::where('email', 'admin@the.it')->exists()) {
            User::create([
                'name' => 'Mika',
                'email' => 'admin@the.it',
                'password' => bcrypt('12345678'),
                'is_admin' => true,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rimuovi gli utenti admin se esistono
        User::where('email', 'admin@theaulabpost.it')->delete();
        User::where('email', 'admin@the.it')->delete();

        // Rimuovi la colonna is_admin
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'is_admin')) {
                $table->dropColumn('is_admin');
            }
        });
    }
};
