import React from 'react';
import { Link, useLocation } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import LanguageSwitcher from './LanguageSwitcher';
import Logout from './logout';

const Navbar = ({ onLogout }) => {
  const location = useLocation();
  const { t } = useTranslation();
  
  const user = JSON.parse(localStorage.getItem('user') || '{}');

  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
      <div className="container-fluid">
        <Link className="navbar-brand" to="/dashboard">
          {t('navbar.title')}
        </Link>
        
        <button 
          className="navbar-toggler" 
          type="button" 
          data-bs-toggle="collapse" 
          data-bs-target="#navbarNav"
        >
          <span className="navbar-toggler-icon"></span>
        </button>
        
        <div className="collapse navbar-collapse" id="navbarNav">
          <ul className="navbar-nav me-auto">
            <li className="nav-item">
              <Link 
                className={`nav-link ${location.pathname === '/dashboard' ? 'active' : ''}`} 
                to="/dashboard"
              >
                📊 {t('navbar.dashboard')}
              </Link>
            </li>
            <li className="nav-item">
              <Link 
                className={`nav-link ${location.pathname === '/products' ? 'active' : ''}`} 
                to="/products"
              >
                📦 {t('navbar.products')}
              </Link>
            </li>
            <li className="nav-item">
              <Link 
                className={`nav-link ${location.pathname === '/clients' ? 'active' : ''}`} 
                to="/clients"
              >
                👥 {t('navbar.clients')}
              </Link>
            </li>
            <li className="navitem">
              <Link 
                className={`nav-link ${location.pathname === '/orders' ? 'active' : ''}`} 
                to="/orders"
              >
                📋 {t('navbar.orders')}
              </Link>
            </li>
          </ul>
          
          <div className="d-flex align-items-center">
            {user.username && (
              <span className="navbar-text me-3">
                👤 {user.username}
              </span>
            )}
            
            <LanguageSwitcher />
            <Logout onLogout={onLogout} />
          </div>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;