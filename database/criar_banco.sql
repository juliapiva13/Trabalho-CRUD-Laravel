-- Script SQL para criar o banco de dados do sistema de veículos
-- Execute este script no phpMyAdmin ou no MySQL do XAMPP

CREATE DATABASE IF NOT EXISTS veiculos_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Use o banco de dados criado
USE veiculos_db;

-- O Laravel criará as tabelas automaticamente através das migrations
-- Execute: php artisan migrate


