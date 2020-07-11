<template>
    <el-card class="box-card">
        <h4>{{ content }}</h4>
        <div class="flex">
            <p>{{ subContent }}</p>
            <el-link @click="$emit('details', id)">詳しくみる<i class="el-icon-view el-icon--right"></i></el-link>
        </div>
    </el-card>
</template>

<script>
export default {
    props: {
        id: {
            type: String|Number,
            required: true
        },
        content: {
            type: String,
            required: true
        },
        subContent: {
            type: String,
            required: true
        }
    }
}
</script>

<style scoped>
.text {
    font-size: 14px;
}

.item {
    padding: 18px 0;
}

.box-card {
    width: 480px;
}

.flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
</style>