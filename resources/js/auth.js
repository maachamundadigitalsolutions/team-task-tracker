import api from './api';

// Login API call
export async function login(email, password) {
  const response = await api.post('/login', { email, password });
  const { token, user } = response.data;

  // Save token in localStorage
  localStorage.setItem('token', token);
  localStorage.setItem('user', JSON.stringify(user));

  return { token, user };
}
