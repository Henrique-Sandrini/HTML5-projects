import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useTranslation } from 'react-i18next';

const Dashboard = () => {
  const { t } = useTranslation();
  const [stats, setStats] = useState({
    totalProducts: 0,
    totalClients: 0,
    totalOrders: 0,
    pendingOrders: 0
  });

  useEffect(() => {
    fetchStats();
  }, []);

  const fetchStats = async () => {
    try {
      const [productsRes, clientsRes, ordersRes] = await Promise.all([
        axios.get('http://localhost:5000/api/products'),
        axios.get('http://localhost:5000/api/clients'),
        axios.get('http://localhost:5000/api/orders')
      ]);

      const pendingOrders = ordersRes.data.filter(order => order.status === 'Pendente').length;

      setStats({
        totalProducts: productsRes.data.length,
        totalClients: clientsRes.data.length,
        totalOrders: ordersRes.data.length,
        pendingOrders
      });
    } catch (error) {
      console.error('Erro ao buscar estatísticas:', error);
    }
  };

  return (
    <div className="container-fluid">
      <h2 className="mb-4">{t('dashboard.title', 'Dashboard')}</h2>
      
      <div className="row">
        <div className="col-md-3 mb-4">
          <div className="card stat-card text-white bg-primary">
            <div className="card-body">
              <h5 className="card-title">{t('dashboard.totalProducts', 'Total Produtos')}</h5>
              <h2 className="card-text">{stats.totalProducts}</h2>
            </div>
          </div>
        </div>
        
        <div className="col-md-3 mb-4">
          <div className="card stat-card text-white bg-success">
            <div className="card-body">
              <h5 className="card-title">{t('dashboard.totalClients', 'Total Clientes')}</h5>
              <h2 className="card-text">{stats.totalClients}</h2>
            </div>
          </div>
        </div>
        
        <div className="col-md-3 mb-4">
          <div className="card stat-card text-white bg-info">
            <div className="card-body">
              <h5 className="card-title">{t('dashboard.totalOrders', 'Total Pedidos')}</h5>
              <h2 className="card-text">{stats.totalOrders}</h2>
            </div>
          </div>
        </div>
        
        <div className="col-md-3 mb-4">
          <div className="card stat-card text-white bg-warning">
            <div className="card-body">
              <h5 className="card-title">{t('dashboard.pendingOrders', 'Pedidos Pendentes')}</h5>
              <h2 className="card-text">{stats.pendingOrders}</h2>
            </div>
          </div>
        </div>
      </div>

      <div className="row">
        <div className="col-md-12">
          <div className="card">
            <div className="card-header">
              <h5 className="card-title mb-0">{t('dashboard.welcome', 'Bem-vindo ao Sistema ERP')}</h5>
            </div>
            <div className="card-body">
              <p>{t('dashboard.description', 'Este é um sistema ERP básico para gerenciamento de produtos, clientes e pedidos.')}</p>
              <p>{t('dashboard.instruction', 'Use o menu acima para navegar entre as diferentes seções do sistema.')}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Dashboard;