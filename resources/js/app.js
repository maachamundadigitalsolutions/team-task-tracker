import './bootstrap';
import 'admin-lte';
import 'admin-lte/dist/css/adminlte.css';
import './api'; // axios instance

import { getDashboard } from './dashboard';

const token = localStorage.getItem('token');

document.addEventListener('DOMContentLoaded', () => {
  const output = document.getElementById('output');

  if (token) {
    getDashboard(token)
      .then(res => {
        console.log('Dashboard data:', res.data);

        // Example: show user info in page
        if (output) {
          output.innerHTML = `
            <h5>Welcome, ${res.data.user.name}</h5>
            <p>Email: ${res.data.user.email}</p>
            <p>Roles: ${res.data.roles ? res.data.roles.join(', ') : ''}</p>
          `;
        }
      })
      .catch(err => {
        console.error('Error fetching dashboard:', err);
        if (output) {
          output.textContent = 'Error fetching dashboard data';
        }
      });
  } else {
    console.log('No token found, please login first.');
    if (output) {
      output.textContent = 'No token found, please login first.';
    }
  }
});
