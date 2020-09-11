<template>
    <form method="POST" :action="route" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="token">
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label for="file">上传文章翻译表</label>
            <input type="file" class="form-control-file" id="file" name="file"
                   accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
        </div>
        <div class="form-group">
            <label for="zh-cn">页面标题（zh-cn）</label>
            <input class="form-control" id="zh-cn" name="zh-cn" :value="remark['zh-cn']"/>
        </div>
        <div class="form-group">
            <label for="zh-hk">页面标题（zh-hk）</label>
            <input class="form-control" id="zh-hk" name="zh-hk" :value="remark['zh-hk']"/>
        </div>
        <div class="form-group">
            <label for="en-us">页面标题（en-us）</label>
            <input class="form-control" id="en-us" name="en-us" :value="remark['en-us']"/>
        </div>
        <div class="form-group">
            <label for="ko-kr">页面标题（ko-kr）</label>
            <input class="form-control" id="ko-kr" name="ko-kr" :value="remark['ko-kr']"/>
        </div>
        <div class="form-group">
            <label for="ja-jp">页面标题（ja-jp）</label>
            <input class="form-control" id="ja-jp" name="ja-jp" :value="remark['ja-jp']"/>
        </div>
        <div class="form-group">
            <label for="de-de">页面标题（de-de）</label>
            <input class="form-control" id="de-de" name="de-de" :value="remark['de-de']"/>
        </div>
        <div class="form-group">
            <label for="fr-fr">页面标题（fr-fr）</label>
            <input class="form-control" id="fr-fr" name="fr-fr" :value="remark['fr-fr']"/>
        </div>
        <div class="form-group">
            <label for="it-it">页面标题（it-it）</label>
            <input class="form-control" id="it-it" name="it-it" :value="remark['it-it']"/>
        </div>
        <div class="form-group">
            <label for="es-es">页面标题（es-es）</label>
            <input class="form-control" id="es-es" name="es-es" :value="remark['es-es']"/>
        </div>
        <div class="form-group">
            <label for="hu-hu">页面标题（hu-hu）</label>
            <input class="form-control" id="hu-hu" name="hu-hu" :value="remark['hu-hu']"/>
        </div>
        <div class="form-group">
            <label for="pl-pl">页面标题（pl-pl）</label>
            <input class="form-control" id="pl-pl" name="pl-pl" :value="remark['pl-pl']"/>
        </div>
        <div class="form-group">
            <label for="tr-tr">页面标题（tr-tr）</label>
            <input class="form-control" id="tr-tr" name="tr-tr" :value="remark['tr-tr']"/>
        </div>
        <div class="form-group">
            <label for="ru-ru">页面标题（ru-ru）</label>
            <input class="form-control" id="ru-ru" name="ru-ru" :value="remark['ru-ru']"/>
        </div>
        <div class="form-group">
            <label for="var">slug</label>
            <input class="form-control" id="var" name="var" :value="remark.var"/>
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
        <div class="form-group text-center pt-3">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" @click="incre">+</button>
                <button type="button" class="btn btn-secondary" @click="decre">-</button>
            </div>
        </div>
        <textarea name="body" cols="30" rows="10" class="form-control d-none">{{ variables }}</textarea>
        <button type="submit" class="btn btn-primary">确定</button>
    </form>
</template>

<script>
export default {
    props: {
        route: String,
        templates: Array,
        remark: Object,
    },
    data() {
        return {
            token: document.head.querySelector('meta[name="csrf-token"]').content,
            variables: JSON.parse(this.remark.body),
            template_id: 1,
            m: JSON.parse(this.remark.body).pop().sort
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
