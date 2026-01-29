import axios from 'axios';
window.axios = axios;
axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

await axios.get('/sanctum/csrf-cookie');
