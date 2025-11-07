# SUPER DPO

## 🚀 Setup

```bash
# 1. Clone the repository
git clone https://github.com/yourusername/super-dpo.git
````markdown
# SUPER DPO

## 🚀 Como executar (Setup)

```bash
# 1. Clone o repositório
git clone https://github.com/yourusername/super-dpo.git
cd super-dpo

# 2. Crie o arquivo de ambiente
cp .env.example .env

# 3. Inicie os containers
docker compose up -d --build

# 4. Instale as dependências
docker compose exec app composer install

# 5. Gere a chave da aplicação
docker compose exec app php artisan key:generate

# 6. Rode as migrations + seed do usuário admin
docker compose exec app php artisan migrate:fresh --seed
```

## 🔑 Acesso padrão do Admin
```
Email: admin@superdpo.com
Senha: password
```

## 🌐 Acesso
Aplicação: http://localhost:8080
Shell do container PHP: `docker compose exec app bash`
````