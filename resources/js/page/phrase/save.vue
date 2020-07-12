<template>
  <div>
    <div class="container">
          <el-form status-icon ref="phrase" label-width="120px" class="demo-phrase">
              <el-form-item label="名言">
                  <el-input type="text" v-model="phrase.content" autocomplete="off" placeholder="少年よ、大志を抱け"></el-input>
              </el-form-item>
              <el-form-item label="作者">
                  <el-select
                    v-if="!id"
                    v-model="phrase.authorId"
                    filterable
                    remote
                    reserve-keyword
                    placeholder="ウィリアム・スミス・クラーク"
                    :remote-method="remoteMethod"
                    :loading="loading">
                    <el-option
                      v-for="item in options"
                      :key="item.id"
                      :label="item.name"
                      :value="item.id">
                    </el-option>
                  </el-select>
                  <p v-else>{{ authName }}</p>
                  <br>
                  <a href="javascript:void(0)" style="cursor: pointer;" @click="openModal">>> 作者を新規登録する</a>
              </el-form-item>
              <el-form-item>
                  <el-button type="primary" @click="savePhrase">{{ title }}</el-button>
              </el-form-item>
          </el-form>
      </div>

      <author-modal 
        title="作者を登録"
        content="作者を登録してください"
        :centerDialogVisible="centerDialogVisible"
        @close="close"
        @register="registerAuthor"
      />
      <notifications 
        position="top left" 
        group="save"
      />
  </div>
</template>

<script>
import phraseApi from '../../api/phraseApi'
import authorApi from '../../api/authorApi'
import AuthorModal from '../../components/Modal/AuthorModal/index'
import { OK, CREATED } from '../../utils/httpStatus'

export default {
  components: {
    AuthorModal
  },
  data() {
    return {
      phrase: {
        content: '',
        authorId: ''
      },
      authName: '',
      centerDialogVisible: false,
      options: [],
      loading: false
    };
  },
  computed: {
    id() {
      return this.$route.params.id
    },
    title() {
      return this.id ? '更新' : '登録'
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    init() {
      if (this.id) {
        this.getPhrase()
      }
    },
    // TODO: selectboxの双方向バインディングができない
    async getPhrase() {
      const { phrase } = await phraseApi.details(this.id)

      this.phrase = phrase
      this.phrase.authorId = phrase.author.id
      this.authName = phrase.author.name
    },
    openModal() {
      this.centerDialogVisible = true
    },
    close() {
        this.centerDialogVisible = false
    },
    async savePhrase() {
      const response = this.id ? await this.updatePhrase() : await this.registerPhrase()

      if (response.status === CREATED || response.status === OK) {
          this.$notify({
            group: 'save',
            type: 'success',
            title: '登録に成功しました',
            text: this.phrase.content
          });

          this.$router.push({ name: 'phrase-list' })
      }

      this.$notify({
          group: 'save',
          type: 'error',
          title: '登録に失敗しました',
          text: this.phrase.content
      });
    },
    async registerPhrase() {
      return await phraseApi.register(this.phrase)
    },
    async updatePhrase() {
      return await phraseApi.update(this.phrase, this.id)
    },
    // 作者の登録
    async registerAuthor(author) {
      const response = await authorApi.register(author)
      
      if (response.status === CREATED) {
        this.$notify({
          group: 'save',
          type: 'success',
          title: '登録完了しました',
          text: author.name
        });
        
        this.close()
      }
    },
    // セレクトボタンの候補一覧取得
    async remoteMethod(query) {
      try {

        this.loading = true
        const { data } = await authorApi.list(query)
        this.options = data

      } finally {

        this.loading = false

      }
      
    }
  }
}
</script>

<style scoped>
.container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>

<style>
.el-select {
  width: 100%;
}
</style>