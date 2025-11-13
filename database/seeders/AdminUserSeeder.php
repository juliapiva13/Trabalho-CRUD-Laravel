<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica se o usuário já existe
        $user = User::where('email', 'admin@admin.com')->first();
        
        if (!$user) {
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@admin.com',
                'password' => 'admin123', // O cast 'hashed' no model fará o hash automaticamente
                'role' => 'administrador',
            ]);
        } else {
            // Atualiza a senha e role caso o usuário já exista
            $user->update([
                'password' => 'admin123',
                'role' => 'administrador',
            ]);
        }
    }
}
