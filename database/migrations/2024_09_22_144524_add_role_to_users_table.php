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
        if (!User::where('email', 'a.mariatina@alice.it')->exists()) {
            User::create([
                'name' => 'MariaTina',
                'email' => 'a.mariatina@alice.it',
                'password' => bcrypt(env('ADMIN1_PASSWORD', 'default1')),
                'is_admin' => true,
            ]);
        }

        if (!User::where('email', 'giuseppe.truglio.1592@gmail.com')->exists()) {
            User::create([
                'name' => 'Peppe',
                'email' => 'giuseppe.truglio.1592@gmail.com',
                'password' => bcrypt(env('ADMIN2_PASSWORD', 'default2')),
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
        User::where('email', 'a.mariatina@alice.it')->delete();
        User::where('email', 'giuseppe.truglio.1592@gmail.com')->delete();

        // Rimuovi la colonna is_admin
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'is_admin')) {
                $table->dropColumn('is_admin');
            }
        });
    }
};
