<template>
    <form method="POST" :action="route" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="token">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" :value="step.id">
        <div class="form-group">
            <label for="product_id">所属产品</label>
            <select class="form-control" name="product_id" id="product_id" v-model="product_id">
                <template v-for="product of products">
                    <option :value="product.id">{{ product.name }}</option>
                </template>
            </select>
        </div>
        <div class="form-group">
            <label for="title">标题</label>
            <input type="text" name="title" id="title" class="form-control" :value="step.title">
        </div>

        <div v-for="(n,key) of variables" class="pt-3 divide position-relative">
            <div class="btn-group position-absolute" role="group" style="right: 0;">
                <button type="button" class="btn btn-sm btn-secondary" @click="add(key)">+</button>
                <button type="button" class="btn btn-sm btn-secondary" @click="del(key)">-</button>
            </div>
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
        <div class="form-group d-none">
            <textarea name="body" class="form-control" cols="30" rows="10" readonly>{{ variables }}</textarea>
        </div>
        <div class="form-group text-center pt-3">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" @click="incre">+</button>
                <button type="button" class="btn btn-secondary" @click="decre">-</button>
            </div>
        </div>
        <div class="form-group">
            <label for="sortx">排序</label>
            <input class="form-control" id="sortx" name="sort" required :value="step.sort"/>
        </div>
        <button type="submit" class="btn btn-primary">确定</button>
    </form>
</template>

<script>
    export default {
        props: {
            route: String,
            products: Array,
            templates: Array,
            step: Object,
        },
        data() {
            return {
                token: document.head.querySelector('meta[name="csrf-token"]').content,
                product_id: this.step.product_id,
                variables: JSON.parse(this.step.body),
                template_id: 1,
                m: JSON.parse(this.step.body).pop().sort
            }
        },
        methods: {
            incre() {
                this.m += 4
                this.variables.push({'variables': '', 'template_id': '1', 'sort': this.m})
            },
            decre() {
                if (this.variables.length > 1) {
                    this.m -= 4
                    this.variables = this.variables.slice(0, -1)
                }
            },
            add(key) {
                this.variables.splice(key + 1, 0, {
                    'variables': '',
                    'template_id': '1',
                    'sort': this.variables[key].sort + 1
                })
            },
            del(key) {
                this.variables.splice(key, 1)
            }
        }
    }
</script>
