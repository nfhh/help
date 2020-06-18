<template>
    <div class="pt-3">
        <div v-if="aftersubmit" class="alert alert alert-secondary" role="alert">
            <p class="text-dark mb-0">{{ text1 }}</p>
        </div>
        <div v-if="togform" class="alert alert alert-secondary" role="alert">
            <p class="text-dark mb-0">{{ text2 }} <a href="javascript:;" @click="yes">{{ text3 }}</a> / <a href="javascript:;" @click="no">{{ text4 }}</a></p>
        </div>
        <div class="card" v-if="showform">
            <div class="card-header">{{ text5 }}</div>
            <div class="card-body">
                <form action="" @submit.prevent="submitPost">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ch1" value="1" v-model="reasons">
                            <label class="custom-control-label" for="ch1">{{ text6 }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ch2" value="2" v-model="reasons">
                            <label class="custom-control-label" for="ch2">{{ text7 }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ch3" value="3" v-model="reasons">
                            <label class="custom-control-label" for="ch3">{{ text8 }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ch4" value="4" v-model="reasons">
                            <label class="custom-control-label" for="ch4">{{ text9 }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body">{{ text10 }}</label>
                        <textarea class="form-control" id="body" rows="3" v-model="body" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" :disabled="ds">{{ text11 }}</button>
                    <button type="button" @click="cancel" class="btn btn-secondary">{{ text12 }}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            text1: {
                type: String,
                default: ''
            },
            text2: {
                type: String,
                default: ''
            },
            text3: {
                type: String,
                default: ''
            },
            text4: {
                type: String,
                default: ''
            },
            text5: {
                type: String,
                default: ''
            },
            text6: {
                type: String,
                default: ''
            },
            text7: {
                type: String,
                default: ''
            },
            text8: {
                type: String,
                default: ''
            },
            text9: {
                type: String,
                default: ''
            },
            text10: {
                type: String,
                default: ''
            },
            text11: {
                type: String,
                default: ''
            },
            text12: {
                type: String,
                default: ''
            },
        },
        data() {
            return {
                aftersubmit: false,
                togform: true,
                showform: false,
                reasons: [],
                body: '',
                ds: false
            }
        },
        methods: {
            yes() {
                this.aftersubmit = true
                this.togform = false
            },
            no() {
                this.togform = false
                this.showform = true
            },
            async submitPost() {
                this.ds = true
                try {
                    const res = await axios.post('/feedback', {
                        'url': location.href,
                        'reasons': this.reasons,
                        'body': this.body,
                    })
                    if (res.data.code === 0) {
                        this.aftersubmit = true
                    } else {
                        alert(res.data.message)
                    }
                    this.showform = false
                } catch (e) {
                    this.ds = false
                    alert('error.')
                }
            },
            cancel() {
                this.showform = false
                this.togform = true
            }
        }
    }
</script>
