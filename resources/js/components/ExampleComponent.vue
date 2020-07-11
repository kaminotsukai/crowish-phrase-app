<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                        <div>
                            <el-button type="primary" v-on:click="click_button" :loading="primary_lording">Primary</el-button>
                            <el-date-picker
                                    ref="picker"
                                    v-model="value1"
                                    v-on:change="change_calendar"
                                    type="date"
                                    placeholder="Pick a day">
                            </el-date-picker>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                value1: '2018-01-10', // カレンダーデフォルト値
                primary_lording: false, // ローディングデフォルト値
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            click_button: function() {
                this.$refs.picker.focus() //　ボタンを押すとカレンダーが開く
            },
            change_calendar: function (event) {
                const vm = this
                this.primary_lording = true //　カレンダーの値が変わるとボタンはローディング

                const timer = setInterval(function(){
                    vm.primary_lording = false // ５秒でローディング終了
                    clearInterval(timer)
                }, 5000)
            }
        }
    }
</script>
