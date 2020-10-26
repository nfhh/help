<template>
    <form>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="types"> {{ product_tip1 }}</label>
                <select class="custom-select" id="types" v-model="selected_type_id">
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
                <select class="custom-select" id="products" v-model="initSelectedProduct">
                    <option v-for="item of listenProducts"
                            :key="item.id"
                            :value="item">
                        {{ item.name }}
                    </option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="button" @click="handleClick">{{ start }}</button>
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
        data: () => ({
            types: [],
            sizes: [],
            selected_lan: 'cn',
            products: [],
            selected_size_id: '2',
            disabled: true,
            index: 0,
            steps: [],
            cur_step: null,
            selected_product: {}
        }),
        mounted() {
            if (this.product_id) {
                axios.get(`/api/products/${this.product_id}`).then(response => {
                    const product = response.data.data
                    this.selected_type_id = product.type
                    this.selected_size_id = product.size
                    this.initSelectedProduct = product.name
                })
            }
            axios.get('/api/products').then(response => {
                this.products = response.data.data
                this.types = [...new Set(this.products.map(item => item.type))]
                this.sizes = [...new Set(this.products.map(item => item.size))].sort((a, b) => a - b)
            })
        },
        computed: {
            curProductName() {
                if (Object.keys(this.selected_product).length) {
                    return this.selected_product.name
                }
                if (!(typeof this.listenProducts[0] === 'undefined')) {
                    return this.listenProducts[0].name
                }
            },
            curProductId() {
                if (Object.keys(this.selected_product).length) {
                    return this.selected_product.name
                }
                if (!(typeof this.listenProducts[0] === 'undefined')) {
                    return this.listenProducts[0].name
                }
            },
            initSelectedProduct: {
                get() {
                    if (Object.keys(this.selected_product).length) {
                        return this.selected_product
                    }
                    return this.listenProducts[0]
                },
                set(value) {
                    this.selected_product = value
                }
            },
            listenProducts() {
                this.initSelectedProduct = this.selected_product = {}
                return this.products.filter((item) => {
                    return item['type'] === this.selected_type_id && item['size'] === this.selected_size_id
                })
            }
        },
        methods: {
            handleClick() {
                location.href = `${this.tourl}?product=${this.curProductId}`
            }
        }
    }
</script>
