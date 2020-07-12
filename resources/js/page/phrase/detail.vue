<template>
    <div>
        <div class="container">
            <Card
                :id="phrase.id"
                :content="phrase.content"
                :subContent="phrase.author.name"
                :detail="phrase.author.details"
            ></Card>
            <el-row>
                <el-button type="primary" @click="updatePhrase">更新</el-button>
                <el-button type="danger" @click="deletePhrase">削除</el-button>
            </el-row>
        </div>
        <notifications position="top left" group="detail"/>
    </div>
</template>

<script>
import phraseApi from '../../api/phraseApi'
import Card from '../../components/Card/index'

export default {
    name: 'phrase-detail',
    components: {
        Card
    },
    data() {
        return {
            phrase: {
                id: null,
                content: null,
                author_id: null
            }
        }
    },
    mounted() {
        this.init()
    },
    computed: {
        id() {
            return this.$route.params.id
        }
    },
    methods: {
        async init() {
            const { phrase } = await phraseApi.details(this.id)
            this.phrase = phrase
        },
        async deletePhrase() {
            if (confirm('本当に削除してもよろしいですか？')) {
                const response = await phraseApi.delete(this.id)

                // TODO: 画面遷移されて通知が見えない
                if (response.status === 200) {
                    this.$notify({
                        group: 'detail',
                        type: 'success',
                        title: '削除が完了しました',
                        text: this.phrase.content
                    });
                    this.$router.push({ name: 'phrase-list' })
                }
            }
        },
        updatePhrase() {
            this.$router.push({ name: 'phrase-update' })
        }
    }
}
</script>

<style>
.container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>