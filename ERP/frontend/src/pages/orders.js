import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useTranslation } from 'react-i18next';

const Orders = () => {
  const { t, i18n } = useTranslation();
  
  const [orders, setOrders] = useState([]);
  const [showForm, setShowForm] = useState(false);
  const [clients, setClients] = useState([]);
  const [products, setProducts] = useState([]);
  const [formData, setFormData] = useState({
    client_id: '',
    product_id: '',
    quantity: '',
    total_price: '',
    status: 'pending'
  });
  const [selectedProduct, setSelectedProduct] = useState(null);

  useEffect(() => {
    fetchOrders();
    fetchClients();
    fetchProducts();
  }, []);

  // Funções de fetch
  const fetchOrders = async () => {
    try {
      const response = await axios.get('http://localhost:5000/api/orders');
      setOrders(response.data);
    } catch (error) {
      console.error('Erro ao buscar pedidos:', error);
    }
  };

  const fetchClients = async () => {
    try {
      const response = await axios.get('http://localhost:5000/api/clients');
      setClients(response.data);
    } catch (error) {
      console.error('Erro ao buscar clientes:', error);
    }
  };

  const fetchProducts = async () => {
    try {
      const response = await axios.get('http://localhost:5000/api/products');
      setProducts(response.data);
    } catch (error) {
      console.error('Erro ao buscar produtos:', error);
    }
  };

  // Calcular preço total automaticamente
  const calculateTotalPrice = (productId, quantity) => {
    if (!productId || !quantity || quantity <= 0) {
      return '';
    }
    
    const product = products.find(p => p.id === productId);
    if (!product) {
      return '';
    }
    
    const total = parseFloat(product.price) * parseInt(quantity);
    return total.toFixed(2);
  };

  // Quando o produto é selecionado
  const handleProductChange = (e) => {
    const productId = e.target.value;
    setFormData({
      ...formData,
      product_id: productId,
      total_price: calculateTotalPrice(productId, formData.quantity)
    });
    
    // Encontrar o produto selecionado para mostrar informações
    const product = products.find(p => p.id === productId);
    setSelectedProduct(product);
  };

  // Quando a quantidade é alterada
  const handleQuantityChange = (e) => {
    const quantity = e.target.value;
    setFormData({
      ...formData,
      quantity: quantity,
      total_price: calculateTotalPrice(formData.product_id, quantity)
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await axios.post('http://localhost:5000/api/orders', {
        ...formData,
        quantity: parseInt(formData.quantity),
        total_price: parseFloat(formData.total_price)
      });
      fetchOrders();
      setShowForm(false);
      setFormData({ 
        client_id: '', 
        product_id: '', 
        quantity: '', 
        total_price: '', 
        status: 'pending' 
      });
      setSelectedProduct(null);
    } catch (error) {
      console.error('Erro ao criar pedido:', error);
    }
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    
    if (name === 'product_id') {
      handleProductChange(e);
    } else if (name === 'quantity') {
      handleQuantityChange(e);
    } else {
      setFormData({
        ...formData,
        [name]: value
      });
    }
  };

  const getStatusBadgeClass = (status) => {
    switch (status) {
      case 'delivered': return 'bg-success';
      case 'cancelled': return 'bg-danger';
      case 'shipped': return 'bg-info';
      case 'processing': return 'bg-primary';
      default: return 'bg-warning';
    }
  };

  const getTranslatedStatus = (status) => {
    const statusMap = {
      'pending': t('orders.statusOptions.pending'),
      'processing': t('orders.statusOptions.processing'),
      'shipped': t('orders.statusOptions.shipped'),
      'delivered': t('orders.statusOptions.delivered'),
      'cancelled': t('orders.statusOptions.cancelled')
    };
    return statusMap[status] || status;
  };

  // Resetar form quando abrir/fechar
  const toggleForm = () => {
    if (showForm) {
      setFormData({ 
        client_id: '', 
        product_id: '', 
        quantity: '', 
        total_price: '', 
        status: 'pending' 
      });
      setSelectedProduct(null);
    }
    setShowForm(!showForm);
  };

  return (
    <div className="container-fluid">
      <div className="d-flex justify-content-between align-items-center mb-4">
        <h2>{t('orders.title', 'Gerenciar Pedidos')}</h2>
        <button 
          className="btn btn-primary"
          onClick={toggleForm}
        >
          {showForm ? t('common.cancel', 'Cancelar') : t('orders.newOrder', 'Novo Pedido')}
        </button>
      </div>

      {showForm && (
        <div className="card mb-4">
          <div className="card-header">
            <h5 className="card-title mb-0">{t('orders.addOrder', 'Adicionar Novo Pedido')}</h5>
          </div>
          <div className="card-body">
            <form onSubmit={handleSubmit}>
              <div className="row">
                <div className="col-md-6">
                  <div className="mb-3">
                    <label className="form-label">{t('orders.client', 'Cliente')}</label>
                    <select
                      className="form-control"
                      name="client_id"
                      value={formData.client_id}
                      onChange={handleChange}
                      required
                    >
                      <option value="">{t('orders.selectClient', 'Selecione um cliente')}</option>
                      {clients.map(client => (
                        <option key={client.id} value={client.id}>
                          {client.name}
                        </option>
                      ))}
                    </select>
                  </div>
                </div>
                <div className="col-md-6">
                  <div className="mb-3">
                    <label className="form-label">{t('orders.product', 'Produto')}</label>
                    <select
                      className="form-control"
                      name="product_id"
                      value={formData.product_id}
                      onChange={handleChange}
                      required
                    >
                      <option value="">{t('orders.selectProduct', 'Selecione um produto')}</option>
                      {products.map(product => (
                        <option key={product.id} value={product.id}>
                          {product.name} - R$ {parseFloat(product.price).toFixed(2)}
                        </option>
                      ))}
                    </select>
                  </div>
                </div>
              </div>

              {/* Informações do produto selecionado */}
              {selectedProduct && (
                <div className="alert alert-info">
                  <div className="row">
                    <div className="col-md-6">
                      <strong>Produto:</strong> {selectedProduct.name}
                    </div>
                    <div className="col-md-3">
                      <strong>Preço unitário:</strong> R$ {parseFloat(selectedProduct.price).toFixed(2)}
                    </div>
                    <div className="col-md-3">
                      <strong>Estoque:</strong> {selectedProduct.quantity} unidades
                    </div>
                  </div>
                  {formData.quantity > selectedProduct.quantity && (
                    <div className="mt-2 text-danger">
                      <i className="bi bi-exclamation-triangle"></i> 
                      Quantidade solicitada maior que o estoque disponível!
                    </div>
                  )}
                </div>
              )}
              
              <div className="row">
                <div className="col-md-6">
                  <div className="mb-3">
                    <label className="form-label">{t('orders.quantity', 'Quantidade')}</label>
                    <input
                      type="number"
                      className="form-control"
                      name="quantity"
                      value={formData.quantity}
                      onChange={handleChange}
                      min="1"
                      required
                    />
                    {selectedProduct && (
                      <div className="form-text">
                        Máximo disponível: {selectedProduct.quantity} unidades
                      </div>
                    )}
                  </div>
                </div>
                <div className="col-md-6">
                  <div className="mb-3">
                    <label className="form-label">{t('orders.totalPrice', 'Preço Total (R$)')}</label>
                    <input
                      type="text"
                      className="form-control bg-light"
                      name="total_price"
                      value={formData.total_price ? `R$ ${formData.total_price}` : ''}
                      readOnly
                      placeholder="Será calculado automaticamente"
                    />
                    {formData.total_price && (
                      <div className="form-text text-success">
                        💰 Valor calculado automaticamente
                      </div>
                    )}
                  </div>
                </div>
              </div>

              <div className="mb-3">
                <label className="form-label">{t('orders.status', 'Status')}</label>
                <select
                  className="form-control"
                  name="status"
                  value={formData.status}
                  onChange={handleChange}
                >
                  <option value="pending">{t('orders.statusOptions.pending', 'Pendente')}</option>
                  <option value="processing">{t('orders.statusOptions.processing', 'Processando')}</option>
                  <option value="shipped">{t('orders.statusOptions.shipped', 'Enviado')}</option>
                  <option value="delivered">{t('orders.statusOptions.delivered', 'Entregue')}</option>
                  <option value="cancelled">{t('orders.statusOptions.cancelled', 'Cancelado')}</option>
                </select>
              </div>
              
              <div className="d-flex gap-2">
                <button type="submit" className="btn btn-success">
                  {t('orders.saveOrder', 'Salvar Pedido')}
                </button>
                <button 
                  type="button" 
                  className="btn btn-secondary"
                  onClick={() => {
                    setFormData({ 
                      client_id: '', 
                      product_id: '', 
                      quantity: '', 
                      total_price: '', 
                      status: 'pending' 
                    });
                    setSelectedProduct(null);
                  }}
                >
                  🔄 Limpar
                </button>
              </div>
            </form>
          </div>
        </div>
      )}

      <div className="card">
        <div className="card-header">
          <h5 className="card-title mb-0">{t('orders.orderList', 'Lista de Pedidos')}</h5>
        </div>
        <div className="card-body">
          <div className="table-responsive">
            <table className="table table-striped">
              <thead>
                <tr>
                  <th>{t('orders.clientHeader', 'Cliente')}</th>
                  <th>{t('orders.productHeader', 'Produto')}</th>
                  <th>{t('orders.quantityHeader', 'Quantidade')}</th>
                  <th>{t('orders.totalHeader', 'Total')}</th>
                  <th>{t('orders.statusHeader', 'Status')}</th>
                  <th>{t('orders.dateHeader', 'Data')}</th>
                </tr>
              </thead>
              <tbody>
                {orders.map(order => (
                  <tr key={order.id}>
                    <td>{order.client_name}</td>
                    <td>{order.product_name}</td>
                    <td>{order.quantity}</td>
                    <td>R$ {parseFloat(order.total_price).toFixed(2)}</td>
                    <td>
                      <span className={`badge ${getStatusBadgeClass(order.status)}`}>
                        {getTranslatedStatus(order.status)}
                      </span>
                    </td>
                    <td>{new Date(order.order_date).toLocaleDateString('pt-BR')}</td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Orders;