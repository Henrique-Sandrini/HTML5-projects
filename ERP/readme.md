# ERP System

## Project Overview

This ERP (Enterprise Resource Planning) System was developed as an academic project for the **Full Stack Web Development** course.  
The system implements essential business management features with a modern interface and full internationalization support.

**Instructor:** José  
**Technologies:** React.js, Node.js, SQLite, Bootstrap

---

## Implemented Features

### Authentication Module
- Secure login using JWT (JSON Web Tokens)
- Route protection with restricted access for authenticated users
- Logout with session cleanup
- Default credentials:
  - **Username:** admin  
  - **Password:** admin123

---

### Dashboard
- System overview with real-time metrics
- Informational cards displaying:
  - Total products
  - Total clients
  - Total orders
  - Pending orders

---

### Products Module
- Full CRUD operations for products
- Fields:
  - Name
  - Description
  - Category
  - Price
  - Quantity
- Responsive table listing

---

### Clients Module
- Complete client management
- Fields:
  - Name
  - Email
  - Phone
  - Address
- User-friendly interface for registration and search

---

### Orders Module
- Order creation with automatic value calculation
- Intelligent selection of clients and products
- Automatic total calculation (quantity × price)
- Order statuses:
  - Pending
  - Processing
  - Shipped
  - Delivered
  - Cancelled
- Real-time stock validation

---

### Internationalization (i18n)
- Support for three languages:
  - Portuguese
  - English
  - Spanish
- Dynamic language switching using flags
- Fully translated user interface

---

## Technologies Used

### Frontend
- React.js 18
- React Router DOM
- React i18next
- Axios
- Bootstrap 5

### Backend
- Node.js
- Express.js
- SQLite3
- JWT
- bcryptjs
- CORS
- UUID

---
```
## Project Structure

erp-system/
├── backend/
│ ├── server.js
│ ├── package.json
│ └── node_modules/
└── frontend/
├── public/
│ └── index.html
├── src/
│ ├── components/
│ ├── pages/
│ ├── i18n/
│ ├── App.js
│ ├── App.css
│ └── index.js
└── package.json
```
---

## How to Run the Project

### Prerequisites
- Node.js (version 14 or higher)
- npm

---

### Backend Setup

```
bash
cd backend
npm install
npm run dev
Backend will be available at:
http://localhost:5000
```

### Frontend Setup
```
bash
Copiar código
cd frontend
npm install --legacy-peer-deps
npm start
Frontend will be available at:
http://localhost:3000

Access the System
URL: http://localhost:3000

Username: admin

Password: admin123
```
## API Endpoints

### Authentication
- `POST /api/auth/login` — User login
- `GET /api/auth/verify` — Token verification

---

### Products
- `GET /api/products` — List products
- `POST /api/products` — Create product

---

### Clients
- `GET /api/clients` — List clients
- `POST /api/clients` — Create client

---

### Orders
- `GET /api/orders` — List orders
- `POST /api/orders` — Create order

---

## Technical Highlights

### Advanced Features
- Automatic order total calculation
- Real-time stock validation
- Responsive interface using Bootstrap
- SPA navigation (Single Page Application)
- State management with React Hooks

---

### Security
- JWT-based authentication
- Protected routes on frontend and backend
- Password encryption with bcrypt
- Configured CORS headers

---

### UX/UI
- Modern and intuitive design
- Visual feedback for user actions
- Loading states and error messages
- Full internationalization support

---

## Data Structure

### Database Tables
- `users` — System users
- `products` — Product catalog
- `clients` — Client records
- `orders` — Order records

---

## Author

**Henrique**  
Undergraduate student in Systems Analysis and Development  

This project was developed for educational purposes.
