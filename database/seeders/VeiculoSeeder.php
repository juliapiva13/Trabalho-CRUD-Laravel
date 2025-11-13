<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cor;
use App\Models\Veiculo;

class VeiculoSeeder extends Seeder
{
    public function run(): void
    {
        // Criar Marcas
        $marca1 = Marca::create(['nome' => 'Volkswagen']);
        $marca2 = Marca::create(['nome' => 'Fiat']);
        $marca3 = Marca::create(['nome' => 'Chevrolet']);
        $marca4 = Marca::create(['nome' => 'Ford']);
        $marca5 = Marca::create(['nome' => 'Toyota']);

        // Criar Modelos
        $modelo1 = Modelo::create(['nome' => 'Gol', 'marca_id' => $marca1->id]);
        $modelo2 = Modelo::create(['nome' => 'Polo', 'marca_id' => $marca1->id]);
        $modelo3 = Modelo::create(['nome' => 'Uno', 'marca_id' => $marca2->id]);
        $modelo4 = Modelo::create(['nome' => 'Palio', 'marca_id' => $marca2->id]);
        $modelo5 = Modelo::create(['nome' => 'Onix', 'marca_id' => $marca3->id]);
        $modelo6 = Modelo::create(['nome' => 'Cruze', 'marca_id' => $marca3->id]);
        $modelo7 = Modelo::create(['nome' => 'Ka', 'marca_id' => $marca4->id]);
        $modelo8 = Modelo::create(['nome' => 'Fiesta', 'marca_id' => $marca4->id]);
        $modelo9 = Modelo::create(['nome' => 'Corolla', 'marca_id' => $marca5->id]);
        $modelo10 = Modelo::create(['nome' => 'Hilux', 'marca_id' => $marca5->id]);

        // Criar Cores
        $cor1 = Cor::create(['nome' => 'Branco']);
        $cor2 = Cor::create(['nome' => 'Preto']);
        $cor3 = Cor::create(['nome' => 'Prata']);
        $cor4 = Cor::create(['nome' => 'Vermelho']);
        $cor5 = Cor::create(['nome' => 'Azul']);

        // Criar Veículos
        Veiculo::create([
            'marca_id' => $marca1->id,
            'modelo_id' => $modelo1->id,
            'cor_id' => $cor1->id,
            'ano_fabricacao' => 2020,
            'quilometragem' => 35000,
            'valor' => 45000.00,
            'descricao' => 'Veículo em excelente estado, único dono, revisões em dia. Documentação completa.',
            'foto_principal' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
            'foto_2' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db9?w=800',
            'foto_3' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?w=800',
            'foto_4' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?w=800',
        ]);

        Veiculo::create([
            'marca_id' => $marca1->id,
            'modelo_id' => $modelo2->id,
            'cor_id' => $cor2->id,
            'ano_fabricacao' => 2021,
            'quilometragem' => 20000,
            'valor' => 75000.00,
            'descricao' => 'Seminovo, pouquíssimo uso. Veículo completo com todos os opcionais.',
            'foto_principal' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
            'foto_2' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db9?w=800',
            'foto_3' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?w=800',
            'foto_4' => null,
        ]);

        Veiculo::create([
            'marca_id' => $marca2->id,
            'modelo_id' => $modelo3->id,
            'cor_id' => $cor3->id,
            'ano_fabricacao' => 2019,
            'quilometragem' => 50000,
            'valor' => 35000.00,
            'descricao' => 'Bem conservado, ideal para uso urbano. Economia de combustível.',
            'foto_principal' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
            'foto_2' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db9?w=800',
            'foto_3' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?w=800',
            'foto_4' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?w=800',
        ]);

        Veiculo::create([
            'marca_id' => $marca3->id,
            'modelo_id' => $modelo5->id,
            'cor_id' => $cor4->id,
            'ano_fabricacao' => 2022,
            'quilometragem' => 15000,
            'valor' => 85000.00,
            'descricao' => 'Quase novo, com apenas 15 mil km rodados. Veículo completo e moderno.',
            'foto_principal' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
            'foto_2' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db9?w=800',
            'foto_3' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?w=800',
            'foto_4' => null,
        ]);

        Veiculo::create([
            'marca_id' => $marca4->id,
            'modelo_id' => $modelo7->id,
            'cor_id' => $cor5->id,
            'ano_fabricacao' => 2020,
            'quilometragem' => 40000,
            'valor' => 42000.00,
            'descricao' => 'Veículo bem cuidado, revisões periódicas realizadas. Pronto para uso.',
            'foto_principal' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
            'foto_2' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db9?w=800',
            'foto_3' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?w=800',
            'foto_4' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?w=800',
        ]);

        Veiculo::create([
            'marca_id' => $marca5->id,
            'modelo_id' => $modelo9->id,
            'cor_id' => $cor1->id,
            'ano_fabricacao' => 2023,
            'quilometragem' => 8000,
            'valor' => 120000.00,
            'descricao' => 'Veículo praticamente novo, com apenas 8 mil km. Excelente oportunidade.',
            'foto_principal' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
            'foto_2' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db9?w=800',
            'foto_3' => 'https://images.unsplash.com/photo-1550355291-bbee04a92027?w=800',
            'foto_4' => null,
        ]);
    }
}
