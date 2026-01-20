import i18n from 'i18next';
import { initReactI18next } from 'react-i18next';

i18n
  .use(initReactI18next)
  .init({
    resources: {
      pt: {
        translation: {
          "navbar": {
            "title": "🏢 Sistema ERP",
            "dashboard": "Dashboard",
            "products": "Produtos",
            "clients": "Clientes",
            "orders": "Pedidos"
          },
          "dashboard": {
            "title": "Dashboard",
            "welcome": "Bem-vindo ao Sistema ERP",
            "description": "Este é um sistema ERP básico para gerenciamento de produtos, clientes e pedidos.",
            "instruction": "Use o menu acima para navegar entre as diferentes seções do sistema.",
            "totalProducts": "Total Produtos",
            "totalClients": "Total Clientes", 
            "totalOrders": "Total Pedidos",
            "pendingOrders": "Pedidos Pendentes"
          },
          "products": {
            "title": "Gerenciar Produtos",
            "newProduct": "Novo Produto",
            "addProduct": "Adicionar Novo Produto",
            "name": "Nome",
            "description": "Descrição",
            "category": "Categoria",
            "price": "Preço (R$)",
            "quantity": "Quantidade",
            "saveProduct": "Salvar Produto",
            "productList": "Lista de Produtos",
            "nameHeader": "Nome",
            "descriptionHeader": "Descrição",
            "categoryHeader": "Categoria",
            "priceHeader": "Preço",
            "quantityHeader": "Quantidade"
          },
          "clients": {
            "title": "Gerenciar Clientes",
            "newClient": "Novo Cliente",
            "addClient": "Adicionar Novo Cliente",
            "name": "Nome",
            "email": "Email",
            "phone": "Telefone",
            "address": "Endereço",
            "saveClient": "Salvar Cliente",
            "clientList": "Lista de Clientes",
            "nameHeader": "Nome",
            "emailHeader": "Email",
            "phoneHeader": "Telefone",
            "addressHeader": "Endereço"
          },
          "orders": {
            "title": "Gerenciar Pedidos",
            "newOrder": "Novo Pedido",
            "cancel": "Cancelar",
            "addOrder": "Adicionar Novo Pedido",
            "client": "Cliente",
            "product": "Produto",
            "quantity": "Quantidade",
            "totalPrice": "Preço Total (R$)",
            "status": "Status",
            "saveOrder": "Salvar Pedido",
            "orderList": "Lista de Pedidos",
            "clientHeader": "Cliente",
            "productHeader": "Produto",
            "quantityHeader": "Quantidade",
            "totalHeader": "Total",
            "statusHeader": "Status",
            "dateHeader": "Data",
            "selectClient": "Selecione um cliente",
            "selectProduct": "Selecione um produto",
            "statusOptions": {
              "pending": "Pendente",
              "processing": "Processando",
              "shipped": "Enviado",
              "delivered": "Entregue",
              "cancelled": "Cancelado"
            }
          },
          "login": {
            "title": "Sistema ERP",
            "subtitle": "Faça login em sua conta",
            "username": "Usuário ou Email",
            "password": "Senha",
            "login": "Entrar",
            "loggingIn": "Entrando...",
            "demoCredentials": "Credenciais de demonstração"
          },
          "logout": {
            "logout": "Sair"
          },
          "common": {
            "save": "Salvar",
            "cancel": "Cancelar"
          }
        }
      },
      en: {
        translation: {
          "navbar": {
            "title": "🏢 ERP System",
            "dashboard": "Dashboard",
            "products": "Products",
            "clients": "Clients",
            "orders": "Orders"
          },
          "dashboard": {
            "title": "Dashboard",
            "welcome": "Welcome to ERP System",
            "description": "This is a basic ERP system for managing products, clients and orders.",
            "instruction": "Use the menu above to navigate between different system sections.",
            "totalProducts": "Total Products",
            "totalClients": "Total Clients",
            "totalOrders": "Total Orders",
            "pendingOrders": "Pending Orders"
          },
          "products": {
            "title": "Manage Products",
            "newProduct": "New Product",
            "addProduct": "Add New Product",
            "name": "Name",
            "description": "Description",
            "category": "Category",
            "price": "Price ($)",
            "quantity": "Quantity",
            "saveProduct": "Save Product",
            "productList": "Product List",
            "nameHeader": "Name",
            "descriptionHeader": "Description",
            "categoryHeader": "Category",
            "priceHeader": "Price",
            "quantityHeader": "Quantity"
          },
          "clients": {
            "title": "Manage Clients",
            "newClient": "New Client",
            "addClient": "Add New Client",
            "name": "Name",
            "email": "Email",
            "phone": "Phone",
            "address": "Address",
            "saveClient": "Save Client",
            "clientList": "Client List",
            "nameHeader": "Name",
            "emailHeader": "Email",
            "phoneHeader": "Phone",
            "addressHeader": "Address"
          },
          "orders": {
            "title": "Manage Orders",
            "newOrder": "New Order",
            "cancel": "Cancel",
            "addOrder": "Add New Order",
            "client": "Client",
            "product": "Product",
            "quantity": "Quantity",
            "totalPrice": "Total Price ($)",
            "status": "Status",
            "saveOrder": "Save Order",
            "orderList": "Order List",
            "clientHeader": "Client",
            "productHeader": "Product",
            "quantityHeader": "Quantity",
            "totalHeader": "Total",
            "statusHeader": "Status",
            "dateHeader": "Date",
            "selectClient": "Select a client",
            "selectProduct": "Select a product",
            "statusOptions": {
              "pending": "Pending",
              "processing": "Processing",
              "shipped": "Shipped",
              "delivered": "Delivered",
              "cancelled": "Cancelled"
            }
          },
          "login": {
            "title": "ERP System",
            "subtitle": "Login to your account",
            "username": "Username or Email",
            "password": "Password",
            "login": "Login",
            "loggingIn": "Logging in...",
            "demoCredentials": "Demo credentials"
          },
          "logout": {
            "logout": "Logout"
          },
          "common": {
            "save": "Save",
            "cancel": "Cancel"
          }
        }
      },
      es: {
        translation: {
          "navbar": {
            "title": "🏢 Sistema ERP",
            "dashboard": "Panel",
            "products": "Productos",
            "clients": "Clientes",
            "orders": "Pedidos"
          },
          "dashboard": {
            "title": "Panel de Control",
            "welcome": "Bienvenido al Sistema ERP",
            "description": "Este es un sistema ERP básico para la gestión de productos, clientes y pedidos.",
            "instruction": "Use el menú superior para navegar entre las diferentes secciones del sistema.",
            "totalProducts": "Total Productos",
            "totalClients": "Total Clientes",
            "totalOrders": "Total Pedidos",
            "pendingOrders": "Pedidos Pendientes"
          },
          "products": {
            "title": "Gestionar Productos",
            "newProduct": "Nuevo Producto",
            "addProduct": "Agregar Nuevo Producto",
            "name": "Nombre",
            "description": "Descripción",
            "category": "Categoría",
            "price": "Precio ($)",
            "quantity": "Cantidad",
            "saveProduct": "Guardar Producto",
            "productList": "Lista de Productos",
            "nameHeader": "Nombre",
            "descriptionHeader": "Descripción",
            "categoryHeader": "Categoría",
            "priceHeader": "Precio",
            "quantityHeader": "Cantidad"
          },
          "clients": {
            "title": "Gestionar Clientes",
            "newClient": "Nuevo Cliente",
            "addClient": "Agregar Nuevo Cliente",
            "name": "Nombre",
            "email": "Correo Electrónico",
            "phone": "Teléfono",
            "address": "Dirección",
            "saveClient": "Guardar Cliente",
            "clientList": "Lista de Clientes",
            "nameHeader": "Nombre",
            "emailHeader": "Correo Electrónico",
            "phoneHeader": "Teléfono",
            "addressHeader": "Dirección"
          },
          "orders": {
            "title": "Gestionar Pedidos",
            "newOrder": "Nuevo Pedido",
            "cancel": "Cancelar",
            "addOrder": "Agregar Nuevo Pedido",
            "client": "Cliente",
            "product": "Producto",
            "quantity": "Cantidad",
            "totalPrice": "Precio Total ($)",
            "status": "Estado",
            "saveOrder": "Guardar Pedido",
            "orderList": "Lista de Pedidos",
            "clientHeader": "Cliente",
            "productHeader": "Producto",
            "quantityHeader": "Cantidad",
            "totalHeader": "Total",
            "statusHeader": "Estado",
            "dateHeader": "Fecha",
            "selectClient": "Seleccione un cliente",
            "selectProduct": "Seleccione un producto",
            "statusOptions": {
              "pending": "Pendiente",
              "processing": "Procesando",
              "shipped": "Enviado",
              "delivered": "Entregado",
              "cancelled": "Cancelado"
            }
          },
          "login": {
            "title": "Sistema ERP",
            "subtitle": "Iniciar sesión en su cuenta",
            "username": "Usuario o Correo",
            "password": "Contraseña",
            "login": "Iniciar Sesión",
            "loggingIn": "Iniciando sesión...",
            "demoCredentials": "Credenciales de demostración"
          },
          "logout": {
            "logout": "Salir"
          },
          "common": {
            "save": "Guardar",
            "cancel": "Cancelar"
          }
        }
      }
    },
    lng: "pt",
    fallbackLng: "pt",
    interpolation: {
      escapeValue: false
    }
  });

export default i18n;