<template>
    <div>
        <input
            type="text"
            v-model="busca"
            class="form-control mb-3"
            placeholder="Buscar por marca, modelo ou ano..."
        >

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th @click="ordenar('marca')" style="cursor:pointer">Marca</th>
                    <th @click="ordenar('modelo')" style="cursor:pointer">Modelo</th>
                    <th @click="ordenar('ano')" style="cursor:pointer">Ano</th>
                    <th width="150">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="carro in carrosFiltrados" :key="carro.id">
                    <td>{{ carro.marca }}</td>
                    <td>{{ carro.modelo }}</td>
                    <td>{{ carro.ano }}</td>
                    <td class="d-flex gap-2">
                        <a :href="`/carros/${carro.id}`" class="btn btn-sm btn-info">Ver</a>
                        <a :href="`/carros/${carro.id}/edit`" class="btn btn-sm btn-warning">Editar</a>                    
                        <button @click="excluir(carro.id)" class="btn btn-sm btn-danger">Deletar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        carros: Array
    },

    data() {
        return{
            busca: '',
            coluna: '',
            asc: true
        }
    },

    computed: {
        carrosFiltrados() {
            let lista = this.carros.filter(c => 
                c.marca.toLowerCase().includes(this.busca.toLowerCase()) ||
                c.modelo.toLowerCase().includes(this.busca.toLowerCase()) ||
                c.ano.toString().includes(this.busca)
            )

            if (this.coluna) {
                lista.sort((a, b) => {
                if (a[this.coluna] < b[this.coluna]) return this.asc ? -1 : 1
                if (a[this.coluna] > b[this.coluna]) return this.asc ? 1 : -1
                return 0
            })
        }
        return lista
    }        
},
    methods: {
        ordenar(col) {
            if (this.coluna == col){
                this.asc = !this.asc
            } else {
                this.coluna = col
                this.asc = true
            }
        },

        excluir(id) {
            if (!confirm('Tem certeza que deseja excluir este carro?')) return

            fetch(`/carros/${id}`, {
                method: 'POST',
                redirect: 'manual',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: new URLSearchParams({
                    _method: 'DELETE'
                })
            }).then(() => {
                window.location.href = '/carros'
            })
        }
    }
}
</script>