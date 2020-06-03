<template>
    <form method="POST" :action="route" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="token">
        <div class="form-group">
            <label for="product_id">所属产品</label>
            <select class="form-control" name="product_id" id="product_id" v-model="product_id">
                <template v-for="product of products">
                    <option :value="product.id">{{ product.name }}</option>
                </template>
            </select>
        </div>
        <div class="form-group">
            <label for="file">上传</label>
            <input type="file" class="form-control-file" id="file" name="file"
                   accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        </div>
        <div v-for="(n,key) in variables">
            <div class="form-group">
                <label for="variable">设置变量</label>
                <textarea class="form-control" id="variable" rows="4" v-model.trim="n.variables" required></textarea>
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline" v-for="item in templates">
                    <input class="form-check-input" type="radio" :id="'template_id'+item.id+key"
                           :value="item.id" v-model="n.template_id">
                    <label class="form-check-label" :for="'template_id'+item.id+key">{{ item.name }}</label>
                </div>
            </div>
            <div class="form-group">
                <label for="sort">块排序</label>
                <input class="form-control" id="sort" v-model="n.sort"/>
            </div>
        </div>
        <div class="form-group text-center">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" @click="incre">+</button>
                <button type="button" class="btn btn-secondary" @click="decre">-</button>
            </div>
        </div>
        <textarea name="body" cols="30" rows="10" class="d-none">{{ variables }}</textarea>
        <div class="form-group">
            <label for="sortx">排序</label>
            <input class="form-control" id="sortx" name="sort" required/>
        </div>
        <button type="submit" class="btn btn-primary">确定</button>
    </form>
</template>

<script>
    export default {
        props: {
            route: String,
            products: Array,
            templates: Array
        },
        data() {
            return {
                token: document.head.querySelector('meta[name="csrf-token"]').content,
                product_id: this.products[0].id,
                variables: [
                    {'variables': '', 'template_id': '1', 'sort': 0}
                ],
                template_id: 1,
                m: 0
            }
        },
        methods: {
            incre() {
                this.m += 2
                this.variables.push({'variables': '', 'template_id': '1', 'sort': this.m})
            },
            decre() {
                if (this.variables.length > 1) {
                    this.m -= 2
                    this.variables = this.variables.slice(0, -1)
                }
            }
        }
    }
</script>
