import { createApp } from 'vue'
  import mycomponent from '/views/admin/my-component.js'

  createApp({
      components: {
        mycomponent
      },
    data() {
      return {
        message: 'Hello Vue!'
      }
    }
  }).mount('#app')