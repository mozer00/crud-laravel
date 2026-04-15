import { createApp } from 'vue'
import TabelaCarros from './components/TabelaCarros.vue'

const app = createApp({})


app.component('tabela-carros', TabelaCarros)

app.mount('#app')