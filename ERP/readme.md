Sistema ERP - Documentação do Projeto
Sobre o Projeto
Sistema ERP (Enterprise Resource Planning) desenvolvido como projeto acadêmico para a disciplina de Desenvolvimento Web Full Stack. O sistema implementa funcionalidades essenciais de gestão empresarial com interface moderna e internacionalização.

Professor: José
Tecnologias: React.js, Node.js, SQLite, Bootstrap

Funcionalidades Implementadas
Módulo de Autenticação
Login seguro com JWT (JSON Web Tokens)

Proteção de rotas - acesso restrito a usuários autenticados

Logout com limpeza de sessão

Credenciais padrão: admin / admin123

Dashboard
Visão geral do sistema com métricas em tempo real

Cards informativos com totais de produtos, clientes, pedidos e pedidos pendentes

Módulo de Produtos
CRUD completo de produtos

Campos: Nome, Descrição, Categoria, Preço, Quantidade

Listagem com tabela responsiva

Módulo de Clientes
Gestão de clientes com dados completos

Campos: Nome, Email, Telefone, Endereço

Interface intuitiva para cadastro e consulta

Módulo de Pedidos
Criação de pedidos com cálculo automático de valores

Seleção inteligente de clientes e produtos

Cálculo automático do total baseado em quantidade × preço

Status do pedido: Pendente, Processando, Enviado, Entregue, Cancelado

Validação de estoque em tempo real

Internacionalização (i18n)
Suporte a 3 idiomas: Português, Inglês e Espanhol

Troca dinâmica de idioma com bandeiras

Tradução completa de todas as interfaces

Tecnologias Utilizadas
Frontend
React.js 18

React Router DOM

React i18next

Axios

Bootstrap 5

Backend
Node.js

Express.js

SQLite3

JWT

bcryptjs

CORS

UUID

Estrutura do Projeto
text
erp-system/
├── backend/
│   ├── server.js
│   ├── package.json
│   └── node_modules/
└── frontend/
    ├── public/
    │   └── index.html
    ├── src/
    │   ├── components/
    │   ├── pages/
    │   ├── i18n/
    │   ├── App.js
    │   ├── App.css
    │   └── index.js
    └── package.json
Como Executar o Projeto
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
Pré-requisitos
Node.js (versão 14 ou superior)

npm

1. Configuração do Backend
bash
cd backend
npm install
npm run dev
Backend disponível em: http://localhost:5000

2. Configuração do Frontend
bash
cd frontend
npm install --legacy-peer-deps
npm start
Frontend disponível em: http://localhost:3000

3. Acesse o Sistema
URL: http://localhost:3000

Usuário: admin

Senha: admin123

API Endpoints
Autenticação
POST /api/auth/login - Login de usuário

GET /api/auth/verify - Verificar token

Produtos
GET /api/products - Listar produtos

POST /api/products - Criar produto

Clientes
GET /api/clients - Listar clientes

POST /api/clients - Criar cliente

Pedidos
GET /api/orders - Listar pedidos

POST /api/orders - Criar pedido

Destaques Técnicos
Funcionalidades Avançadas
Cálculo Automático de valores em pedidos

Validação em Tempo Real de estoque disponível

Interface Responsiva com Bootstrap

Navegação por SPA (Single Page Application)

Gestão de Estado com React Hooks

Segurança
Autenticação baseada em JWT

Proteção de rotas no frontend e backend

Senhas criptografadas com bcrypt

Headers CORS configurados

UX/UI
Design moderno e intuitivo

Feedback visual para ações do usuário

Loading states e mensagens de erro

Internacionalização completa

Estrutura de Dados
Tabelas do Banco
users - Usuários do sistema

products - Catálogo de produtos

clients - Cadastro de clientes

orders - Registro de pedidos

Desenvolvido por
Henrique
Acadêmico de Analise e Desenvolvimento de Sistemas
Projeto desenvolvido para fins educacionais.