import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import { I18nextProvider } from 'react-i18next';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './app.css';

import i18n from './i18n';
import ProtectedRoute from './components/ProtectedRoute';
import Navbar from './components/navbar';
import Login from './pages/login';
import Dashboard from './pages/dashboard';
import Products from './pages/products';
import Clients from './pages/clients';
import Orders from './pages/orders';

function App() {
  const [isAuthenticated, setIsAuthenticated] = useState(false);

  // Verificar autenticação ao carregar e quando o storage mudar
  useEffect(() => {
    const checkAuth = () => {
      const token = localStorage.getItem('token');
      setIsAuthenticated(!!token);
    };

    checkAuth();

    // Ouvir mudanças no localStorage
    window.addEventListener('storage', checkAuth);
    
    return () => {
      window.removeEventListener('storage', checkAuth);
    };
  }, []);

  return (
    <I18nextProvider i18n={i18n}>
      <Router>
        <div className="App">
          {isAuthenticated && <Navbar />}
          <div className={isAuthenticated ? "container-fluid mt-3" : ""}>
            <Routes>
              <Route 
                path="/login" 
                element={
                  !isAuthenticated ? 
                    <Login onLogin={() => setIsAuthenticated(true)} /> : 
                    <Navigate to="/dashboard" replace />
                } 
              />
              <Route 
                path="/dashboard" 
                element={
                  <ProtectedRoute>
                    <Dashboard />
                  </ProtectedRoute>
                } 
              />
              <Route 
                path="/products" 
                element={
                  <ProtectedRoute>
                    <Products />
                  </ProtectedRoute>
                } 
              />
              <Route 
                path="/clients" 
                element={
                  <ProtectedRoute>
                    <Clients />
                  </ProtectedRoute>
                } 
              />
              <Route 
                path="/orders" 
                element={
                  <ProtectedRoute>
                    <Orders />
                  </ProtectedRoute>
                } 
              />
              <Route 
                path="/" 
                element={
                  <Navigate to={isAuthenticated ? "/dashboard" : "/login"} replace />
                } 
              />
            </Routes>
          </div>
        </div>
      </Router>
    </I18nextProvider>
  );
}

export default App;