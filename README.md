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

Execute as migrations para criar todas as tabelas:

```bash
php artisan migrate
```

Se precisar executar apenas a nova migration de clientes:

```bash
php artisan migrate --path=/database/migrations/2026_01_22_140956_create_clientes_table.php
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

## 🌐 Acessando o Projeto

Após iniciar o servidor, você pode acessar as seguintes páginas:

### Páginas do Site (Públicas)

| Rota | URL | Descrição |
|------|-----|-----------|
| Principal | `http://localhost:8000/` | Página inicial do site |
| Sobre | `http://localhost:8000/sobre` | Página sobre a empresa |
| Contato | `http://localhost:8000/contato` | Formulário de contato |
| Login | `http://localhost:8000/login` | Página de login |

### Área da Aplicação (App)

| Rota | URL | Descrição |
|------|-----|-----------|
| Dashboard | `http://localhost:8000/app/home` | Dashboard com estatísticas |
| Fornecedores | `http://localhost:8000/app/fornecedores` | Gerenciamento de fornecedores |
| Produtos | `http://localhost:8000/app/produtos` | Gerenciamento de produtos |
| Clientes | `http://localhost:8000/app/clientes` | Gerenciamento de clientes |

### 📝 Testando as Funcionalidades

**0. Criar Usuário Administrador:**

Antes de testar o sistema, crie um usuário admin executando:

```bash
php artisan db:seed --class=AdminUserSeeder
```

**Credenciais de Acesso:**
- **Email:** admin@supergestao.com.br
- **Senha:** 123456

**1. Fazer Login no Sistema:**
- Acesse: `http://localhost:8000/login`
- Use as credenciais acima
- Após o login, você será redirecionado para o Dashboard

**2. Dashboard Administrativo:**
- Acesse: `http://localhost:8000/app/home`
- Visualize estatísticas rápidas do sistema
- Use o menu lateral para navegar

**3. Gerenciar Fornecedores (CRUD Completo):**
- Listar: `http://localhost:8000/app/fornecedores`
- Criar novo: Clique em "+ Novo Fornecedor"
- Editar: Clique em "Editar" em qualquer fornecedor
- Excluir: Clique em "Excluir" (com confirmação)
Gerenciar Produtos (CRUD Completo):**
- Listar: `http://localhost:8000/app/produtos`
- Criar novo: Clique em "+ Novo Produto"
- Editar: Clique em "Editar" em qualquer produto
- Excluir: Clique em "Excluir" (com confirmação)

**5. Gerenciar Clientes (CRUD Completo):**
- 7. Ver Dados Cadastrados:**
- Fornecedores: `http://localhost:8000/app/fornecedores`
- Produtos: `http://localhost:8000/app/produtos`
- Clientes: `http://localhost:8000/app/clientes`

**8
**6. 
**4. Testar Formulário de Contato:**
- Acesse: `http://localhost:8000/contato`
- Preencha o formulário com nome, telefone, email, motivo e mensagem
- Submeta o formulário
- Você verá uma mensagem de sucesso
- Os dados serão salvos na tabela `site_contatos`

**5. Ver Fornecedores Cadastrados:**
- Acesse: `http://localhost:8000/app/fornecedores`
- Vocêtodos os produtos
App\Models\Produto::all();

# Ver todos os clientes
Ap9\Models\Cliente::all();

# Ver  verá a listagem dos fornecedores criados pelos seeders
**6. Verificar Dados no Banco:**
**3. Verificar Dados no Banco:**

```bash
# Acessar o Tinker do Laravel
php artisan tinker

# Ver todos os fornecedores
App\Models\Fornecedor::all();

# Ver todos os contatos
App\Models\SiteContato::all();

# Ver usuários
App\Models\User::all();
```

**7. Listar Todas as Rotas Disponíveis:**

```bash
php artisan route:list
```

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

### ✅ Implementadas

#### Sistema de Autenticação
- Login de usuários
- Logout
- Proteção de rotas com middleware `auth`
- Lembrar-me (remember me)
- Mensagens de erro personalizadas

#### Área Administrativa
- Dashboard com estatísticas
- Layout responsivo com menu lateral
- Sistema de notificações (success/error)
- Navegação entre módulos

#### CRUD de Fornecedores (Completo)
- Listagem com paginação
- Criar novo fornecedor
- Editar fornecedor existente
- Excluir fornecedor (com confirmação)
- Validação de campos
- Mensagens de feedback

#### Formulário de Contato
- Validação de campos
- Salvamento no banco de dados
- Mensagens de sucesso
- Preservação de dados em caso de erro (old input)
- Select com motivos de contato

#### CRUD de Produtos (Completo)
- Listagem com paginação
- Criar novo produto com validação
- Editar produto existente
- Excluir produto (com confirmação)
- Campos: nome, descrição, peso, preço, estoque mínimo e máximo
- Validação de campos numéricos

#### CRUD de Clientes (Completo)
- Listagem com paginação
- Criar novo cliente com validação
- Editar cliente existente
- Excluir cliente (com confirmação)
- Campos: nome, CPF, email, telefone, endereço completo
- Validação de unicidade (CPF e email)

#### Dashboard Melhorado
- Estatísticas em tempo real
- Contadores de fornecedores, produtos e clientes
- Cards com cores diferenciadas
- Interface limpa e intuitiva

### 🚧 A Implementar

- Sistema de Unidades
- Detalhes de Produtos (relacionamento)
- Relacionamentos entre entidades
- Sistema de permissões/roles
- Relatórios
- Dashboard com gráficos

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
