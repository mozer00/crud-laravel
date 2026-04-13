import { createApp } from 'vue'
import FormularioCarro from './components/FormularioCarro.vue'
import TabelaCarros from './components/TabelaCarros.vue'

const app = createApp({})

app.component('formulario-carro', FormularioCarro)

app.component('tabela-carros', TabelaCarros)

app.mount('#app')