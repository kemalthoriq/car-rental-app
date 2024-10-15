import { createApp } from 'vue';
import Register from './components/Register.vue';
import CarList from './components/CarList.vue';

const app = createApp({});
app.component('register', Register);
app.component('car-list', CarList);
app.mount('#app');