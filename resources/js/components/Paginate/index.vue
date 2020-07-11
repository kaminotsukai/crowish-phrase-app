<template>
    <el-pagination
        background
        layout="prev, pager, next"
        :total="total"
        @current-change="currentChange"
    >
    </el-pagination>
</template>

<script>
export default {
    props: {
        total: {
            type: Number,
            required: true
        }
    },
    methods: {
        currentChange(val) {
            this.$emit('currentChange', val)
        }
    }
}
</script>