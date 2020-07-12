import httpClient from './httpClient'

export default {

    // 一覧取得
    async list(query) {
        return httpClient.get('/authors', {
            params: {
                query: query
            }
        })
    },

    // 作者登録
    async register(author) {
        const params = {
            name: author.name,
            detail: author.detail
        }

        return httpClient.post('/authors', params)
        .then(response => response)
        .catch(error => error.response || error)
    }
}