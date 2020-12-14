<template>
    <form>
        <div class="form-row" v-if="!emailedx">
            <div class="col-md-4 mb-3">
                <label for="email">Email</label>
                <input type="email" :class="email_error ? 'form-control is-invalid' : 'form-control'" id="email"
                       v-model="email" ref="email" autofocus/>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="types"> {{ product_tip1 }}</label>
                <select class="custom-select" id="types" v-model="selected_type_idx">
                    <option v-for="(v,k) of types" :key="k" :value="v">
                        {{ v }}
                    </option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="sizes"> {{ product_tip2 }}</label>
                <select class="custom-select" id="sizes" v-model="selected_size_id">
                    <option v-for="(v,k) of sizes" :key="k" :value="v">
                        {{ v }}
                    </option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="products"> {{ product_tip3 }}</label>
                <select :class="three_error ? 'custom-select is-invalid' : 'custom-select'" id="products"
                        v-model="initSelectedProduct">
                    <option value="">---</option>
                    <option v-for="item of listenProducts"
                            :key="item.id"
                            :value="item.name">
                        {{ item.name }}
                    </option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="button" @click="handleClick" :disabled="disabled">{{ start }}</button>
    </form>
</template>

<script>
export default {
    props: {
        tourl: {
            type: String,
            default: ''
        },
        product_id: {
            type: String,
            default: ''
        },
        start: {
            type: String,
            default: ''
        },
        selected_type_id: {
            type: String,
            default: ''
        },
        product_tip1: {
            type: String,
            default: ''
        },
        product_tip2: {
            type: String,
            default: ''
        },
        product_tip3: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            types: [],
            sizes: [],
            selected_lan: 'cn',
            products: [],
            selected_size_id: '2',
            disabled: false,
            index: 0,
            steps: [],
            cur_step: null,
            selected_product: {},
            initSelectedProduct: '',
            three_error: false,
            email: '',
            email_error: false,
            selected_type_idx: this.selected_type_id
        }
    },
    watch: {
        email(value) {
            this.email_error = !(value.includes('@') && value.includes('.'))
        },
        initSelectedProduct(value) {
            this.three_error = value === ''
        }
    },
    mounted() {
        axios.get('/api/products').then(response => {
            this.products = response.data.data
            this.types = [...new Set(this.products.map(item => item.type))]
            this.sizes = [...new Set(this.products.map(item => item.size))].sort((a, b) => a - b)
        })
    },
    computed: {
        emailedx() {
            return Cookies.get('emailed') == 1
        },
        listenProducts() {
            this.selected_product = {}
            return this.products.filter((item) => {
                return item['type'] === this.selected_type_idx && item['size'] === this.selected_size_id
            })
        }
    },
    methods: {
        handleClick() {
            if (!this.emailedx) {
                if (!this.email) {
                    this.email_error = true
                    this.$refs.email.focus()
                    return
                }

                if (!(this.email.includes('@') && this.email.includes('.'))) {
                    this.email_error = true
                    this.$refs.email.focus()
                    return
                }
            }
            if (this.initSelectedProduct === '') {
                this.three_error = true
                return
            }
            this.email_error = false
            this.disabled = true
            Cookies.set('emailed', 1)
            axios.post('/api/email/store', {
                'email': this.email,
                'cplb': this.selected_type_idx,
                'pwsl': this.selected_size_id,
                'idxh': this.initSelectedProduct,
            }).then(() => {

            }).catch(() => {

            })
            location.href = `${this.tourl}?product=${this.initSelectedProduct}`
        }
    }
}
</script>
