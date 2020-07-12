import axios from 'axios'
import { Loading } from 'element-ui'

let httpClient = axios.create({
    baseURL: 'http://localhost:3000/api',
    timeout: 30000,
    headers: {
      "Content-Type": "application/json",
    }
})

let loadingInstance;

httpClient.interceptors.request.use(config => {
  loadingInstance = Loading.service({ fullscreen: true })
  return config
})

httpClient.interceptors.response.use(response => {
  loadingInstance.close()
  return response
})

httpClient.interceptors.response.use(null, error => {
  loadingInstance.close()

  switch (error.response.status) {
    // ROUTING
  }

  return Promise.reject(error);
})

export default httpClient