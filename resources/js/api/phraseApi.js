import httpClient from './httpClient'

export default {
    async list(page) {
        return httpClient.get('/phrases', {
            params: {
                page: page
            }
        })
        .then(response => response.data)
        .catch(error => error.response || error)
    }
}