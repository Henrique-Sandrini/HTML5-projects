import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { useTranslation } from 'react-i18next';
import axios from 'axios';
import './login.css';

const Login = ({ onLogin }) => {
  const { t } = useTranslation();
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    username: '',
    password: ''
  });
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
    setError('');
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError('');

    try {
      const response = await axios.post('http://localhost:5000/api/auth/login', formData);
      
      // Salvar token e dados do usuário
      localStorage.setItem('token', response.data.token);
      localStorage.setItem('user', JSON.stringify(response.data.user));
      
      // Notificar o App que o login foi bem-sucedido
      if (onLogin) {
        onLogin();
      }
      
      // Redirecionar para dashboard
      navigate('/dashboard');
    } catch (error) {
      if (error.response) {
        setError(error.response.data.error || 'Erro ao fazer login');
      } else if (error.request) {
        setError('Não foi possível conectar ao servidor. Verifique se o backend está rodando.');
      } else {
        setError('Erro inesperado: ' + error.message);
      }
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="login-container">
      <div className="login-card">
        <div className="login-header">
          <h2>{t('login.title', 'Sistema ERP')}</h2>
          <p>{t('login.subtitle', 'Faça login em sua conta')}</p>
        </div>

        {error && (
          <div className="alert alert-danger" role="alert">
            {error}
          </div>
        )}

        <form onSubmit={handleSubmit}>
          <div className="mb-3">
            <label htmlFor="username" className="form-label">
              {t('login.username', 'Usuário ou Email')}
            </label>
            <input
              type="text"
              className="form-control"
              id="username"
              name="username"
              value={formData.username}
              onChange={handleChange}
              required
              disabled={loading}
              placeholder="admin"
            />
          </div>

          <div className="mb-3">
            <label htmlFor="password" className="form-label">
              {t('login.password', 'Senha')}
            </label>
            <input
              type="password"
              className="form-control"
              id="password"
              name="password"
              value={formData.password}
              onChange={handleChange}
              required
              disabled={loading}
              placeholder="admin123"
            />
          </div>

          <button 
            type="submit" 
            className="btn btn-primary w-100 login-btn"
            disabled={loading}
          >
            {loading ? (
              <>
                <span className="spinner-border spinner-border-sm me-2" role="status"></span>
                {t('login.loggingIn', 'Entrando...')}
              </>
            ) : (
              t('login.login', 'Entrar')
            )}
          </button>
        </form>

        <div className="login-footer mt-3">
          <small className="text-muted">
            {t('login.demoCredentials', 'Credenciais de demonstração')}:<br />
            <strong>Usuário:</strong> admin<br />
            <strong>Senha:</strong> admin123
          </small>
        </div>
      </div>
    </div>
  );
};

export default Login;