<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CompradorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cria um usuário comprador de exemplo
        $user = User::where('email', 'comprador@comprador.com')->first();
        
        if (!$user) {
            User::create([
                'name' => 'Comprador',
                'email' => 'comprador@comprador.com',
                'password' => 'comprador123',
                'role' => 'comprador',
            ]);
        } else {
            $user->update([
                'password' => 'comprador123',
                'role' => 'comprador',
            ]);
        }
    }
}
