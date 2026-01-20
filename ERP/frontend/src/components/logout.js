import React from 'react';
import { useNavigate } from 'react-router-dom';
import { useTranslation } from 'react-i18next';

const Logout = ({ onLogout }) => {
  const { t } = useTranslation();
  const navigate = useNavigate();

  const handleLogout = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    
    // Notificar o App que o logout foi feito
    if (onLogout) {
      onLogout();
    }
    
    navigate('/login');
  };

  return (
    <button 
      className="btn btn-outline-light btn-sm ms-2"
      onClick={handleLogout}
      title={t('logout.logout', 'Sair')}
    >
      🚪 {t('logout.logout', 'Sair')}
    </button>
  );
};

export default Logout;