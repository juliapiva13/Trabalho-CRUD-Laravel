# 🚗 Sistema de Venda de Veículos - Laravel

Sistema web desenvolvido em Laravel para gerenciamento e visualização de veículos à venda, similar aos portais Carros.com.br, iCarros ou Webmotors.

## 📋 Sobre o Projeto

Este projeto foi desenvolvido como trabalho prático acadêmico utilizando o framework Laravel. O sistema possui duas áreas distintas: uma área pública para visualização de veículos e uma área administrativa para gerenciamento completo do sistema.

## ✨ Funcionalidades

### 🌐 Área Pública
- ✅ Listagem de todos os veículos disponíveis
- ✅ Sistema de filtros avançado (marca, modelo, cor, ano, valor)
- ✅ Visualização de detalhes completos do veículo
- ✅ Galeria de fotos com múltiplas imagens
- ✅ Informações detalhadas: marca, modelo, cor, ano, quilometragem e valor
- ✅ Sistema de cadastro e login para compradores
- ✅ Gerenciamento de perfil do comprador (editar dados, trocar senha, excluir conta)

### 🔐 Área Administrativa
- ✅ Dashboard com estatísticas do sistema
- ✅ CRUD completo de Marcas
- ✅ CRUD completo de Modelos
- ✅ CRUD completo de Cores
- ✅ CRUD completo de Veículos
- ✅ Sistema de autenticação separado para administradores
- ✅ Validação completa de formulários
- ✅ Interface moderna e responsiva
- ✅ Mínimo de 3 fotos obrigatórias por veículo

## 🛠️ Tecnologias Utilizadas

- **Laravel 12** - Framework PHP
- **PHP 8.2+** - Linguagem de programação
- **MySQL** - Banco de dados
- **Bootstrap 4/5** - Framework CSS
- **Blade Templates** - Sistema de templates do Laravel
- **Bootstrap Icons** - Biblioteca de ícones

## 📦 Requisitos

Antes de começar, certifique-se de ter instalado:

- PHP >= 8.2
- Composer
- MySQL (ou XAMPP com MySQL)
- Node.js e NPM (opcional, para assets)

## 🔑 Credenciais de Acesso

### 👨‍💼 Área Administrativa

- **URL:** `http://localhost:8000/admin/login`
- **E-mail:** `admin@admin.com`
- **Senha:** `admin123`

**Funcionalidades:**
- Dashboard com estatísticas
- Gerenciar marcas de veículos
- Gerenciar modelos de veículos
- Gerenciar cores disponíveis
- Cadastrar, editar e excluir veículos
- Visualizar todos os veículos cadastrados

## 📁 Estrutura do Projeto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/
│   │   │   ├── LoginController.php
│   │   │   ├── AdminLoginController.php
│   │   │   └── RegisterController.php
│   │   ├── Admin/
│   │   │   ├── DashboardController.php
│   │   │   ├── MarcaController.php
│   │   │   ├── ModeloController.php
│   │   │   ├── CorController.php
│   │   │   └── VeiculoController.php
│   │   ├── Comprador/
│   │   │   └── ProfileController.php
│   │   └── Public/
│   │       └── VeiculoController.php
│   └── Middleware/
│       └── CheckAdmin.php
└── Models/
    ├── User.php
    ├── Marca.php
    ├── Modelo.php
    ├── Cor.php
    └── Veiculo.php

resources/
└── views/
    ├── layouts/
    │   ├── carbook.blade.php (Layout público)
    │   └── admin.blade.php (Layout administrativo)
    ├── public/
    │   └── veiculos/
    │       ├── index.blade.php
    │       └── show.blade.php
    ├── auth/
    │   ├── login.blade.php
    │   └── register.blade.php
    ├── comprador/
    │   └── profile/
    │       ├── index.blade.php
    │       ├── edit.blade.php
    │       ├── change-password.blade.php
    │       └── delete.blade.php
    └── admin/
        ├── auth/
        │   └── login.blade.php
        ├── dashboard.blade.php
        ├── marcas/
        ├── modelos/
        ├── cores/
        └── veiculos/

database/
├── migrations/
│   ├── create_users_table.php
│   ├── create_marcas_table.php
│   ├── create_modelos_table.php
│   ├── create_cores_table.php
│   ├── create_veiculos_table.php
│   ├── add_role_to_users_table.php
│   └── add_telefone_to_users_table.php
└── seeders/
    ├── DatabaseSeeder.php
    ├── AdminUserSeeder.php
    ├── CompradorUserSeeder.php
    └── VeiculoSeeder.php
```

## 🎨 Template e Design

O sistema utiliza o template **Carbook** para a área pública, integrado com Blade Templates do Laravel. A área administrativa possui design moderno com Bootstrap 5, gradientes e animações.

### Características do Template:
- Design responsivo
- Sistema de templates com `@extends`, `@section` e `@yield`
- Integração completa com Bootstrap
- Interface moderna e intuitiva

## 📝 Observações Importantes

- As imagens dos veículos são armazenadas como **URLs (links)**, não há upload de arquivos
- Cada veículo deve ter no **mínimo 3 fotos** (foto_principal, foto_2 e foto_3 são obrigatórias)
- O sistema utiliza **templates Blade** com `@extends`, `@section` e `@yield`
- Todas as rotas administrativas são protegidas por **autenticação e middleware `admin`**
- **Validações** são implementadas em todos os formulários com mensagens em português
- O sistema possui **dois tipos de usuários**: compradores e administradores
- **Filtros avançados** na página inicial permitem buscar veículos por diversos critérios

## 🗄️ Estrutura do Banco de Dados

O banco de dados possui as seguintes tabelas:

- **users**: Usuários do sistema (compradores e administradores)
- **marcas**: Marcas de veículos (ex: Volkswagen, Fiat, Chevrolet)
- **modelos**: Modelos de veículos (ex: Gol, Uno, Onix)
- **cores**: Cores disponíveis (ex: Branco, Preto, Prata)
- **veiculos**: Veículos cadastrados com todas as informações

## 📸 Screenshots

<img width="1588" height="770" alt="image" src="https://github.com/user-attachments/assets/bb3a2fac-a1fe-4eb2-b5c5-168ddcf0d42a" />
<img width="1592" height="771" alt="image" src="https://github.com/user-attachments/assets/cbef900a-4fca-4c05-ad15-f1f142c2eb53" />
<img width="1584" height="767" alt="image" src="https://github.com/user-attachments/assets/e2fd737e-7b3e-4546-a1ae-d039585b1006" />



## 👨‍💻 Autor
Murilo Losnak
Ana Julia Piva Gasparotto
Desenvolvido como trabalho prático acadêmico.

## 📄 Licença

Este projeto é de uso acadêmico.

---

**Desenvolvido com ❤️ usando Laravel**
