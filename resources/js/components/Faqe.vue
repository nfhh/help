<template>
    <form method="POST" :action="route" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="token">
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="subject_id">faq分类</label>
            <select class="form-control" name="subject_id" id="subject_id" v-model="subject_id">
                <template v-for="subject of subjects">
                    <template v-if="subject.children.length">
                        <option :value="subject.id" disabled>{{ subject['zh-cn'] }}</option>
                        <option v-for="child of subject.children" :value="child.id">--{{ child['zh-cn'] }}
                        </option>
                    </template>
                    <option v-else :value="subject.id">{{ subject['zh-cn'] }}</option>
                </template>
            </select>
        </div>
        <div class="form-group">
            <label for="file">上传</label>
            <input type="file" class="form-control-file" id="file" name="file"
                   accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        </div>
		<div class="form-group">
            <label for="title">标题变量</label>
			<input class="form-control" id="title" name="title" :value="faq.title"/>
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
        <button type="submit" class="btn btn-primary">确定</button>
    </form>
</template>

<script>
    export default {
        props: {
            route: String,
            subjects: Array,
            templates: Array,
            faq: Object,
        },
        data() {
            return {
                token: document.head.querySelector('meta[name="csrf-token"]').content,
                subject_id: this.faq.subject_id,
                variables: JSON.parse(this.faq.body),
                template_id: 1,
                m: JSON.parse(this.faq.body).pop().sort
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
