<template>    
    <form @submit.prevent="submit">
        <div class="mb-3">
        <label class="form-label">Marca</label>
        <input
            type="text"
            v-model="form.marca"
            class="form-control"
            :class="{ 'is-invalid': errors.marca }"
        />
        <div class="invalid-feedback">{{ errors.marca }}</div>
        </div>

        <div class="mb-3">
        <label class="form-label">Modelo</label>
        <input
            type="text"
            v-model="form.modelo"
            class="form-control"
            :class="{ 'is-invalid': errors.modelo }"
        />
        <div class="invalid-feedback">{{ errors.modelo }}</div>
        </div>

        <div class="mb-3">
        <label class="form-label">Ano</label>
        <input
            type="number"
            v-model="form.ano"
            class="form-control"
            :class="{ 'is-invalid': errors.ano }"
        />
        <div class="invalid-feedback">{{ errors.ano }}</div>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>

        <button type="button" @click="voltar" class="btn btn-secondary ms-2">Voltar</button>

    </form>
</template>

<script>
    export default {
    props: {
        carro: {
        type: Object,
        default: () => ({ marca: '', modelo: '', ano: '' })
        }
    },

    data() {
        return {
        form: { ...this.carro },
        errors: {}
        }
    },

    watch: {
        form: {
        deep: true,
        handler() {
            this.validate()
        }
        }
    },

    methods: {
        validate() {
        this.errors = {}

        if (!this.form.marca) {
            this.errors.marca = 'Marca é obrigatória'
        }

        if (!this.form.modelo) {
            this.errors.modelo = 'Modelo é obrigatório'
        }

        if (!this.form.ano) {
            this.errors.ano = 'Ano é obrigatório'
        } else if (this.form.ano.toString().length !== 4) {
            this.errors.ano = 'Precisa ter 4 dígitos'
        }
        },

        handleSubmit() {
        this.validate()

        if (Object.keys(this.errors).length > 0) return

        this.$emit('submit', this.form)
        },

    submit() {
        this.validate()

        if (Object.keys(this.errors).length > 0) return

        const url = this.form.id 
            ? `/carros/${this.form.id}` 
            : '/carros'

        fetch(url, {
            method: this.form.id ? 'PUT' : 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(this.form)
        }).then(() => window.location.href = '/carros')
    },
    voltar(){
        window.location.href = '/carros'
    }
    }
}        
</script>