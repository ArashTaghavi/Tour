import axios from 'axios';

const axios_instance = axios.create({baseURL: '/api/admin/'});

let token = document.head.querySelector('meta[name="csrf-token"]');

window.token = token.content;

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['Accept'] = 'application/json';
axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;


window.axios = axios_instance;

export default axios_instance;
