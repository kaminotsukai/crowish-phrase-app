<template>
    <el-dialog
        :title="title"
        :visible.sync="centerDialogVisible"
        @close="$emit('close')"
        width="60%"
        center
    >
        <el-form status-icon ref="phrase" label-width="120px">
            <el-form-item label="作者" prop="content">
                <el-input type="text" v-model="author.name" autocomplete="off" placeholder="ウィリアム・スミス・クラーク"></el-input>
            </el-form-item>
           <el-form-item label="作者詳細">
                <el-input type="textarea" v-model="author.detail" placeholder="北海道開拓時代に活躍した「お雇い外国人」のひとりで、札幌農学校の初代教頭である"></el-input>
            </el-form-item>
        </el-form>
        <span slot="footer" class="dialog-footer">
            <el-button @click="$emit('close')">キャンセル</el-button>
            <el-button type="primary" @click="$emit('register', author)">登録</el-button>
        </span>
    </el-dialog>
</template>

<script>
// TODO: 再度モーダルを開くと前の入力内容が残っている
export default {
data() {
    return {
        author: {
            name: null,
            detail: null
        }
    }
},
props: {
    centerDialogVisible: {
        type: Boolean,
        required: true
    },
    title: {
        type: String,
        required: true
    },
    content: {
        type: String,
        required: true 
    }
}
};
</script>