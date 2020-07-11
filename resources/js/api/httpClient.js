import axios from 'axios'

let httpClient = axios.create({
    baseURL: 'http://localhost:3000/api',
    timeout: 30000,
    headers: {
      "Content-Type": "application/json",
    }
})

export default httpClient