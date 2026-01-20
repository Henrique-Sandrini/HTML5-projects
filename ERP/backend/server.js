const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const sqlite3 = require('sqlite3').verbose();
const { v4: uuidv4 } = require('uuid');

const app = express();
const PORT = process.env.PORT || 5000;

// Middleware
app.use(cors());
app.use(bodyParser.json());

// Banco de dados SQLite
const db = new sqlite3.Database(':memory:');

// Inicializar tabelas
db.serialize(() => {
  // Tabela de produtos
  db.run(`CREATE TABLE products (
    id TEXT PRIMARY KEY,
    name TEXT,
    description TEXT,
    price REAL,
    quantity INTEGER,
    category TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
  )`);

  // Tabela de clientes
  db.run(`CREATE TABLE clients (
    id TEXT PRIMARY KEY,
    name TEXT,
    email TEXT,
    phone TEXT,
    address TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
  )`);

  // Tabela de pedidos
  db.run(`CREATE TABLE orders (
    id TEXT PRIMARY KEY,
    client_id TEXT,
    product_id TEXT,
    quantity INTEGER,
    total_price REAL,
    status TEXT,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients (id),
    FOREIGN KEY (product_id) REFERENCES products (id)
  )`);

  // Dados de exemplo - CORRIGIDO
  const products = [
    [uuidv4(), 'Notebook Dell', 'Notebook Dell Inspiron 15', 2500.00, 10, 'Eletrônicos'],
    [uuidv4(), 'Mouse Logitech', 'Mouse sem fio', 89.90, 25, 'Periféricos'],
    [uuidv4(), 'Teclado Mecânico', 'Teclado mecânico RGB', 299.90, 15, 'Periféricos']
  ];

  const clients = [
    [uuidv4(), 'João Silva', 'joao@email.com', '(11) 99999-9999', 'Rua A, 123 - São Paulo, SP'],
    [uuidv4(), 'Maria Santos', 'maria@email.com', '(11) 88888-8888', 'Av. B, 456 - Rio de Janeiro, RJ']
  ];

  // Inserir produtos
  const insertProduct = db.prepare(`INSERT INTO products (id, name, description, price, quantity, category) VALUES (?, ?, ?, ?, ?, ?)`);
  products.forEach(product => {
    insertProduct.run(product);
  });
  insertProduct.finalize();

  // Inserir clientes
  const insertClient = db.prepare(`INSERT INTO clients (id, name, email, phone, address) VALUES (?, ?, ?, ?, ?)`);
  clients.forEach(client => {
    insertClient.run(client);
  });
  insertClient.finalize();

  console.log('Banco de dados inicializado com dados de exemplo!');
});

// Rotas para Produtos
app.get('/api/products', (req, res) => {
  db.all('SELECT * FROM products ORDER BY created_at DESC', (err, rows) => {
    if (err) {
      res.status(500).json({ error: err.message });
      return;
    }
    res.json(rows);
  });
});

app.post('/api/products', (req, res) => {
  const { name, description, price, quantity, category } = req.body;
  const id = uuidv4();
  
  db.run(
    `INSERT INTO products (id, name, description, price, quantity, category) VALUES (?, ?, ?, ?, ?, ?)`,
    [id, name, description, price, quantity, category],
    function(err) {
      if (err) {
        res.status(500).json({ error: err.message });
        return;
      }
      res.json({ id, name, description, price, quantity, category });
    }
  );
});

// Rotas para Clientes
app.get('/api/clients', (req, res) => {
  db.all('SELECT * FROM clients ORDER BY created_at DESC', (err, rows) => {
    if (err) {
      res.status(500).json({ error: err.message });
      return;
    }
    res.json(rows);
  });
});

app.post('/api/clients', (req, res) => {
  const { name, email, phone, address } = req.body;
  const id = uuidv4();
  
  db.run(
    `INSERT INTO clients (id, name, email, phone, address) VALUES (?, ?, ?, ?, ?)`,
    [id, name, email, phone, address],
    function(err) {
      if (err) {
        res.status(500).json({ error: err.message });
        return;
      }
      res.json({ id, name, email, phone, address });
    }
  );
});

// Rotas para Pedidos
app.get('/api/orders', (req, res) => {
  const query = `
    SELECT o.*, c.name as client_name, p.name as product_name 
    FROM orders o 
    LEFT JOIN clients c ON o.client_id = c.id 
    LEFT JOIN products p ON o.product_id = p.id 
    ORDER BY o.order_date DESC
  `;
  
  db.all(query, (err, rows) => {
    if (err) {
      res.status(500).json({ error: err.message });
      return;
    }
    res.json(rows);
  });
});

app.post('/api/orders', (req, res) => {
  const { client_id, product_id, quantity, total_price, status } = req.body;
  const id = uuidv4();
  
  db.run(
    `INSERT INTO orders (id, client_id, product_id, quantity, total_price, status) VALUES (?, ?, ?, ?, ?, ?)`,
    [id, client_id, product_id, quantity, total_price, status || 'Pendente'],
    function(err) {
      if (err) {
        res.status(500).json({ error: err.message });
        return;
      }
      res.json({ id, client_id, product_id, quantity, total_price, status });
    }
  );
});

// Rota de saúde da API
app.get('/api/health', (req, res) => {
  res.json({ status: 'API funcionando!', timestamp: new Date().toISOString() });
});

app.listen(PORT, () => {
  console.log(`🚀 Servidor rodando na porta ${PORT}`);
  console.log(`📊 API disponível em: http://localhost:${PORT}/api`);
});
// Novas dependências para autenticação
const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');

// Adicione estas dependências no topo com os outros requires
// npm install jsonwebtoken bcryptjs

// Chave secreta para JWT (em produção use variável de ambiente)
const JWT_SECRET = 'seu_segredo_jwt_aqui';

// Tabela de usuários
db.serialize(() => {
  // ... tabelas existentes ...

  // Tabela de usuários
  db.run(`CREATE TABLE users (
    id TEXT PRIMARY KEY,
    username TEXT UNIQUE,
    email TEXT UNIQUE,
    password TEXT,
    role TEXT DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
  )`);

  // Usuário admin padrão
  const adminPassword = bcrypt.hashSync('admin123', 10);
  db.run(
    `INSERT INTO users (id, username, email, password, role) VALUES (?, ?, ?, ?, ?)`,
    [uuidv4(), 'admin', 'admin@erp.com', adminPassword, 'admin']
  );
});

// Middleware para verificar token JWT
const authenticateToken = (req, res, next) => {
  const authHeader = req.headers['authorization'];
  const token = authHeader && authHeader.split(' ')[1]; // Bearer TOKEN

  if (!token) {
    return res.status(401).json({ error: 'Token de acesso requerido' });
  }

  jwt.verify(token, JWT_SECRET, (err, user) => {
    if (err) {
      return res.status(403).json({ error: 'Token inválido' });
    }
    req.user = user;
    next();
  });
};

// Rota de Login
app.post('/api/auth/login', async (req, res) => {
  const { username, password } = req.body;

  try {
    // Buscar usuário no banco
    db.get('SELECT * FROM users WHERE username = ? OR email = ?', [username, username], async (err, user) => {
      if (err) {
        return res.status(500).json({ error: 'Erro no servidor' });
      }

      if (!user) {
        return res.status(401).json({ error: 'Credenciais inválidas' });
      }

      // Verificar senha
      const validPassword = await bcrypt.compare(password, user.password);
      if (!validPassword) {
        return res.status(401).json({ error: 'Credenciais inválidas' });
      }

      // Gerar token JWT
      const token = jwt.sign(
        { 
          id: user.id, 
          username: user.username, 
          role: user.role 
        },
        JWT_SECRET,
        { expiresIn: '24h' }
      );

      res.json({
        message: 'Login realizado com sucesso',
        token,
        user: {
          id: user.id,
          username: user.username,
          email: user.email,
          role: user.role
        }
      });
    });
  } catch (error) {
    res.status(500).json({ error: 'Erro no servidor' });
  }
});

// Rota de Registro (opcional)
app.post('/api/auth/register', async (req, res) => {
  const { username, email, password } = req.body;

  try {
    const hashedPassword = await bcrypt.hash(password, 10);
    const userId = uuidv4();

    db.run(
      `INSERT INTO users (id, username, email, password) VALUES (?, ?, ?, ?)`,
      [userId, username, email, hashedPassword],
      function(err) {
        if (err) {
          if (err.message.includes('UNIQUE constraint failed')) {
            return res.status(400).json({ error: 'Usuário ou email já existe' });
          }
          return res.status(500).json({ error: 'Erro ao criar usuário' });
        }

        // Gerar token automaticamente após registro
        const token = jwt.sign(
          { id: userId, username, role: 'user' },
          JWT_SECRET,
          { expiresIn: '24h' }
        );

        res.status(201).json({
          message: 'Usuário criado com sucesso',
          token,
          user: {
            id: userId,
            username,
            email,
            role: 'user'
          }
        });
      }
    );
  } catch (error) {
    res.status(500).json({ error: 'Erro no servidor' });
  }
});

// Rota para verificar token
app.get('/api/auth/verify', authenticateToken, (req, res) => {
  res.json({ 
    valid: true, 
    user: req.user 
  });
});

// Proteger rotas da API (exemplo)
app.get('/api/protected/products', authenticateToken, (req, res) => {
  // Sua lógica normal aqui
  db.all('SELECT * FROM products', (err, rows) => {
    if (err) {
      res.status(500).json({ error: err.message });
      return;
    }
    res.json(rows);
  });
});