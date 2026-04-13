import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

app.component('hello-world', {
    template: `<h3>oieeee</h3>`
});

app.mount('#app');
