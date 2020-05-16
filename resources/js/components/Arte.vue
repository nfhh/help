<template>
    <form method="POST" :action="route" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="token">
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="category_id">所属分类</label>
            <select class="form-control" name="category_id" id="category_id" v-model="category_id">
                <template v-for="category of categories">
                    <template v-if="category.children.length">
                        <option :value="category.id" disabled>{{ category.name }}</option>
                        <option v-for="child of category.children" :value="child.id">--{{ child.name }}
                        </option>
                    </template>
                    <option v-else :value="category.id">{{ category.name }}</option>
                </template>
            </select>
        </div>
        <div class="form-group">
            <label for="file">上传</label>
            <input type="file" class="form-control-file" id="file" name="file"
                   accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        </div>

        <div v-for="n of variables">
            <div class="form-group">
                <label for="variable">设置变量</label>
                <textarea class="form-control" id="variable" rows="4" v-model.trim="n.variables" required></textarea>
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline" v-for="item in templates">
                    <input class="form-check-input" type="radio" :id="'template_id'+item.id"
                           :value="item.id" v-model="n.template_id">
                    <label class="form-check-label">{{ item.name }}</label>
                </div>
            </div>
            <div class="form-group">
                <label for="sort">排序</label>
                <input class="form-control" id="sort" rows="4" v-model="n.sort"/>
            </div>
        </div>
        <div class="form-group text-center">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" @click="incre">+</button>
                <button type="button" class="btn btn-secondary" @click="decre">-</button>
            </div>
        </div>
        <textarea name="body" cols="30" rows="10" class="d-none">{{ variables }}</textarea>
        <button type="submit" class="btn btn-primary">确定</button>
    </form>
</template>

<script>
    export default {
        props: {
            route: String,
            categories: Array,
            templates: Array,
            article: Object,
        },
        data() {
            return {
                token: document.head.querySelector('meta[name="csrf-token"]').content,
                category_id: this.article.category_id,
                variables: JSON.parse(this.article.body),
                template_id: 1,
                m: JSON.parse(this.article.body).pop().sort
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
