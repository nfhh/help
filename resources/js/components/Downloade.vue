<template>
    <form method="POST" :action="route">
        <input type="hidden" name="_token" :value="token">
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="product_id">所属产品</label>
            <select class="form-control" name="product_id" id="product_id" v-model="product_id">
                <option v-for="product of products" :value="product.id">{{ product.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="menu_id">类型</label>
            <select class="form-control" name="menu_id" id="menu_id" v-model="menu_id">
                <option v-for="menu of menus" :value="menu.id">{{ menu['zh-cn'] }}</option>
            </select>
        </div>
        <div v-for="(val,key) of variables" class="pt-3 divide">
            <div class="form-group">
                <div class="form-check form-check-inline" v-for="(k,v) in lans">
                    <input class="form-check-input" type="radio" :id="'lan_'+v+key"
                           :value="v" v-model="val.lan">
                    <label class="form-check-label" :for="'lan_'+v+key">{{ k }}</label>
                </div>
            </div>
            <div class="form-group">
                <label for="name">名称</label>
                <input class="form-control" id="name" v-model="val.name"/>
            </div>
            <div class="form-group">
                <label for="description">描述</label>
                <input class="form-control" id="description" v-model="val.description"/>
            </div>
            <div class="form-group">
                <label for="version">版本</label>
                <input class="form-control" id="version" v-model="val.version"/>
            </div>
            <div class="form-group">
                <label for="url">文件url</label>
                <input type="text" class="form-control" id="url" name="url" v-model="val.url">
            </div>
            <div class="form-group">
                <label for="size">文件大小</label>
                <input type="text" class="form-control" id="size" name="size" v-model="val.size">
            </div>
            <div class="form-group">
                <label for="remark">备注</label>
                <input type="text" class="form-control" id="remark" name="remark" v-model="val.remark">
            </div>
        </div>
        <div class="form-group text-center pt-3">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" @click="incre">+</button>
                <button type="button" class="btn btn-secondary" @click="decre">-</button>
            </div>
        </div>
        <div class="form-group d-none">
            <textarea name="body" class="form-control" cols="30" rows="10">{{ variables }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">确定</button>
    </form>
</template>

<script>
    export default {
        props: {
            route: String,
            products: Array,
            menus: Array,
            lans: Object,
            download: Object,
        },
        data() {
            return {
                token: document.head.querySelector('meta[name="csrf-token"]').content,
                product_id: this.download.product_id,
                menu_id: this.download.menu_id,
                variables: JSON.parse(this.download.body),
            }
        },
        methods: {
            incre() {
                this.variables.push({
                    "lan": "",
                    "name": "",
                    "description": "",
                    "version": "",
                    "url": "",
                    "size": "",
                    "remark": ""
                })
            },
            decre() {
                if (this.variables.length > 1) {
                    this.variables = this.variables.slice(0, -1)
                }
            }
        }
    }
</script>
