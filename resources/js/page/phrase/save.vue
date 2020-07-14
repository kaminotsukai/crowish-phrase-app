<template>
  <div>
    <Header />
    <div class="container">
          <el-form status-icon ref="phrase" label-width="120px" class="demo-phrase">
              <el-form-item label="名言">
                  <el-input type="text" v-model="phrase.content" autocomplete="off" placeholder="少年よ、大志を抱け"></el-input>
              </el-form-item>
              <el-form-item label="作者">
                  <el-input type="text" v-model="phrase.author_name" autocomplete="off" placeholder="ウィリアム・スミス・クラーク"></el-input>
              </el-form-item>
              <el-form-item>
                  <el-button type="primary" @click="savePhrase">{{ title }}</el-button>
              </el-form-item>
          </el-form>
      </div>

      <notifications 
        position="top left" 
        group="save"
      />
  </div>
</template>

<script>
import phraseApi from '../../api/phraseApi'
import { OK, CREATED } from '../../utils/httpStatus'
import Header from '../../components/Header/index'

export default {
  components: {
    Header
  },
  data() {
    return {
      phrase: {
        content: '',
        author_name: ''
      },
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
    async getPhrase() {
      const { data } = await phraseApi.details(this.id)
      this.phrase = data.phrase
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