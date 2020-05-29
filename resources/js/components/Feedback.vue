<template>
    <div>
        <div v-if="aftersubmit" class="alert alert-primary" role="alert">
            <p class="text-dark mb-0">{{ text1 }}</p>
        </div>
        <div v-if="togform" class="alert alert-primary" role="alert">
            <p class="text-dark mb-0">{{ text2 }} <a href="">{{ text3 }}</a> / <a href="">{{
                text4 }}</a></p>
        </div>
        <div class="card" v-if="showform">
            <div class="card-header">{{ text5 }}</div>
            <div class="card-body">
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="ch1" value="1">
                        <label class="custom-control-label" for="ch1">{{ text6 }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="ch2" value="2">
                        <label class="custom-control-label" for="ch2">{{ text7 }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="ch3" value="3">
                        <label class="custom-control-label" for="ch3">{{ text8 }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="ch4" value="4">
                        <label class="custom-control-label" for="ch4">{{ text9 }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{ text10 }}</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ text11 }}</button>
                <button type="button" class="btn btn-secondary">{{ text12 }}</button>
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
            }
        },
        methods: {}
    }
</script>
