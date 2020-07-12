import httpClient from './httpClient'

export default {

    // 取得
    async list(page) {
        return httpClient.get('/phrases', {
            params: {
                page: page
            }
        })
        .then(response => response.data)
        .catch(error => error.response || error)
    },

    // 登録
    async register(phrase) {
        const params = {
            content: phrase.content,
            author_id: phrase.authorId
        }

        return httpClient.post('/phrases', params)
        .then(response => response)
        .catch(error => error.response || error)
    },
    
    // 更新
    async update(phrase, id) {
        const params = {
            content: phrase.content,
            author_id: phrase.authorId
        }

        return httpClient.put(`/phrases/${id}`, params)
        .then(response => response)
        .catch(error => error.response || error)
    },

    // 詳細取得
    async details(id) {
        return httpClient.get(`/phrases/${id}`)
        .then(response => response.data)
        .catch(error => error.response || error)
    },

    // 削除
    async delete(id) {
        return httpClient.delete(`/phrases/${id}`)
        .then(response => response)
        .catch(error => error.response || error)
    }
}