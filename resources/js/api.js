import axios from 'axios';

const api = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL, // Laravel 12 + Vite
  headers: {
    Accept: 'application/json',
  },
});

export default api;
