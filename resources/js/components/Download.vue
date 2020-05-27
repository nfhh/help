<template>
    <form method="POST" :action="route" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="token">
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
        <div v-for="(val,key) of variables">
            <div class="form-group">
                <div class="form-check form-check-inline" v-for="(k,v) in lans">
                    <input class="form-check-input" type="radio" :id="'lan_'+v+key"
                           :value="v" v-model="val.lan">
                    <label class="form-check-label" :for="'lan_'+v+key">{{ k }}</label>
                </div>
            </div>
            <div class="form-group">
                <label for="name">名称</label>
                <input class="form-control" id="name" v-model="val.sort"/>
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
                <label>上传</label>
                <input type="file" class="form-control-file" :name="'file'+key" @change="uploadFile">
            </div>
            <div class="form-group">
                <label for="size">大小</label>
                <input type="text" class="form-control" id="size" name="size" v-model="val.size">
            </div>
            <div class="form-group">
                <label for="remark">备注</label>
                <input type="text" class="form-control" id="remark" name="remark" v-model="val.remark">
            </div>
        </div>
        <div class="form-group text-center">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-secondary" @click="incre">+</button>
                <button type="button" class="btn btn-secondary" @click="decre">-</button>
            </div>
        </div>
        <div class="form-group">
            <textarea name="body" class="form-control" cols="30" rows="10">{{ variables }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">确定</button>
    </form>
</template>

<script>
    import Md5 from 'md5'

    export default {
        props: {
            route: String,
            checkurl: String,
            uploadurl: String,
            products: Array,
            menus: Array,
            lans: Object,
        },
        data() {
            return {
                token: document.head.querySelector('meta[name="csrf-token"]').content,
                product_id: this.products[0].id,
                menu_id: this.menus[0].id,
                variables: [
                    {
                        "lan": "",
                        "name": "",
                        "description": "",
                        "version": "",
                        "url": "",
                        "size": "",
                        "remark": ""
                    }
                ],
                file: null
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
            },
            uploadFile({target: {files}}) {
                this.file = files[0]

                const fileName = this.file.name
                const fileSize = this.file.size
                const key = Md5(fileName + fileSize + this.file.type)
                const suffix = fileName.substring(fileName.lastIndexOf('.') + 1, fileName.length).toLowerCase()

                const shardSize = 2 * 1024 * 1024
                const shardIndex = 1
                const shardTotal = Math.ceil(fileSize / shardSize)

                const param = {
                    shardIndex,
                    shardSize,
                    shardTotal,
                    'name': fileName,
                    suffix,
                    'size': fileSize,
                    key
                }
                this._check(param)
            },
            async _check(param) {
                try {
                    const response = await axios.post(this.checkurl, {
                        key: param.key
                    })
                    const res = response.data.data
                    if (!res) {
                        param.shardIndex = 1
                        console.log('没有找到文件记录，从分片1开始上传')
                        await this._upload(param)
                    } else if (res.shardIndex === res.shardTotal) {
                        alert('文件极速秒传成功')
                        // show res
                    } else {
                        param.shardIndex = res.shardIndex + 1
                        console.log(`找到文件记录，从分片${param.shardIndex}开始上传`)
                        await this._upload(param)
                    }
                } catch (e) {
                    alert('文件上传失败')
                }
            },
            async _upload(param) {
                const shardIndex = param.shardIndex
                const shardTotal = param.shardTotal
                const shardSize = param.shardSize

                const start = (shardIndex - 1) * shardSize
                const end = Math.min(param.size, start + shardSize)
                const fileShard = this.file.slice(start, end)

                // Progress.show(parseInt((shardIndex - 1) * 100 / shardTotal)) // 所以上传第一个分片会显示0%

                const formData = new FormData()
                formData.append('shard', fileShard)
                formData.append('data', JSON.stringify(param))

                try {
                    const response = await axios.post(this.uploadurl, formData)
                    const res = response.data.data
                    // Progress.show(parseInt(shardIndex * 100 / shardTotal)) // 1/4 25%
                    if (shardIndex < shardTotal) {
                        param.shardIndex = param.shardIndex + 1
                        await this._upload(param)
                    } else {
                        // Progress.hide()
                        // show res
                    }
                } catch (e) {
                    alert('文件上传失败')
                }
            }
        }
    }
</script>
