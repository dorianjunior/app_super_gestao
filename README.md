# App Super Gestão

Sistema de gestão desenvolvido com Laravel 9 para gerenciamento de fornecedores, produtos, contatos e unidades.

## 📋 Requisitos

Antes de começar, certifique-se de ter instalado em sua máquina:

- **PHP** >= 8.0.2 (recomendado: 8.2+)
- **Composer** (gerenciador de dependências PHP)
- **MySQL** ou **MariaDB**
- **Node.js** e **NPM** (para compilar assets)
- **Git**

> **Nota:** Este projeto é compatível com PHP 8.2+. Se você encontrar problemas de compatibilidade ao executar `composer install`, execute `composer update` para atualizar as dependências.

## 🚀 Como Rodar o Projeto

### 1. Clone o Repositório

```bash
git clone https://github.com/seu-usuario/app_super_gestao.git
cd app_super_gestao
```

### 2. Instale as Dependências do PHP

```bash
composer install
```

**Importante:** Se você receber um erro sobre versão incompatível do PHP (ex: pacotes travados para PHP < 8.2), execute:

```bash
composer update
```

Isso atualizará as dependências para versões compatíveis com sua versão do PHP.

### 3. Configure o Arquivo de Ambiente

Copie o arquivo de exemplo `.env.example` para `.env`:

```bash
# Windows (PowerShell)
copy .env.example .env

# Linux/Mac
cp .env.example .env
```

Edite o arquivo `.env` e configure as credenciais do banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app_super_gestao
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### 4. Gere a Chave da Aplicação

```bash
php artisan key:generate
```

### 5. Crie o Banco de Dados

Acesse seu MySQL e crie o banco de dados:

```sql
CREATE DATABASE app_super_gestao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Execute as Migrations

```bash
php artisan migrate
```

### 7. Execute os Seeders

Com dados iniciais configurados:

```bash
php artisan db:seed
```

### 8. Instale as Dependências do Node.js

```bash
npm install
```

### 9. Compile os Assets

Para desenvolvimento (com watch):
```bash
npm run dev
```

Para produção:
```bash
npm run prod
```

### 10. Inicie o Servidor de Desenvolvimento

```bash
php artisan serve
```

A aplicação estará disponível em: `http://localhost:8000`

## 🗂️ Estrutura do Projeto

```
app_super_gestao/
├── app/                    # Código da aplicação
│   ├── Http/Controllers/  # Controladores
│   ├── Models/           # Modelos Eloquent
│   └── ...
├── database/
│   ├── migrations/       # Migrações do banco de dados
│   └── seeders/         # Seeders
├── public/              # Arquivos públicos
├── resources/
│   ├── views/          # Views Blade
│   └── css/            # Estilos
├── routes/             # Rotas da aplicação
└── storage/            # Arquivos gerados
```

## 🧪 Executar Testes

```bash
php artisan test
```

ou

```bash
./vendor/bin/phpunit
```

## 📚 Funcionalidades

- Gerenciamento de Fornecedores
- Cadastro de Produtos
- Sistema de Contatos
- Gerenciamento de Unidades
- Detalhes de Produtos

## 🛠️ Tecnologias Utilizadas

- **Laravel 9.x** - Framework PHP
- **MySQL** - Banco de dados
- **Blade** - Template engine
- **Laravel Mix** - Compilação de assets
- **Eloquent ORM** - Mapeamento objeto-relacional

## ⚙️ Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Criar uma nova migration
php artisan make:migration nome_da_migration

# Criar um novo controller
php artisan make:controller NomeController

# Criar um novo model
php artisan make:model NomeModel

# Acessar o Tinker (REPL do Laravel)
php artisan tinker

# Ver todas as rotas
php artisan route:list
```

## 🔧 Solução de Problemas

### Erro: "Your lock file does not contain a compatible set of packages"

Se ao executar `composer install` você receber este erro relacionado à versão do PHP:

```
Your lock file does not contain a compatible set of packages. Please run composer update.
```

**Solução:** Execute `composer update` para atualizar o arquivo `composer.lock` com versões compatíveis com sua versão do PHP:

```bash
composer update
```

### Erro de permissão no storage

No Linux/Mac:
```bash
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:www-data storage bootstrap/cache
```

No Windows, certifique-se de que o usuário tem permissões de escrita nas pastas `storage` e `bootstrap/cache`.

### Erro de conexão com o banco de dados

- Verifique se o MySQL está rodando
- Confirme as credenciais no arquivo `.env`
- Certifique-se de que o banco de dados foi criado

## 📝 License

Este projeto é open-source e está licenciado sob a [MIT license](https://opensource.org/licenses/MIT).
