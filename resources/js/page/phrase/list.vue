<template>
    <div>
        <Header />

        <div class="list-wrapper">
            
            <Paginate 
                :total="total"
                @currentChange="currentChange"
            />

            <div class="card-wrapper" v-for="phrase in phrases" :key="phrase.id">
                <Card
                    :id="phrase.id"
                    :content="phrase.content"
                    :subContent="phrase.author_name"
                    isDetail
                    @details="details"
                ></Card>
            </div>
        </div>

        <div class="position">
            <router-link :to="{ name: 'phrase-register' }" class="btn-circle-flat">+</router-link>
        </div>
    </div>
</template>

<script>
import phraseApi from '../../api/phraseApi'
import Card from '../../components/Card/index'
import Paginate from '../../components/Paginate/index'
import Header from '../../components/Header/index'

export default {
    name: 'phrase-list',
    components: {
        Card,
        Paginate,
        Header
    },
    data() {
        return {
            phrases: [],
            total: 0
        }
    },
    mounted() {
        this.getList()
    },
    methods: {
        async getList(page = null) {
            const response = await phraseApi.list(page)
            this.phrases = response.data
            this.total = response.total
        },
        currentChange(page) {
            this.getList(page)
        },
        details(id) {
            this.$router.push({ name: 'phrase-detail', params: { id: id }})
        }
    }
}
</script>


<style lang="scss" scoped>
.list-wrapper {
    margin: 0 100px;
    width: 80%;
    
}
.card-wrapper {
    margin: 20px auto;
}

.position {
    position: fixed;
    bottom: 20px;
    right: 20px;
    transition: all .3s;

    &:hover {
        bottom: 17px;
    }
}

.btn-circle-flat {
  display: inline-block;
  text-decoration: none;
  background: #87befd;
  color: #FFF;
  width: 50px;
  height: 50px;
  line-height: 50px;
  border-radius: 50%;
  text-align: center;
  overflow: hidden;
  transition: .4s;
  font-size: 2rem;
}

.btn-circle-flat:hover {
  background: #668ad8;
}
</style>