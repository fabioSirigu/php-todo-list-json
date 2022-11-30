const { createApp } = Vue

createApp({
      data() {
            return {
                  tasks: [],
                  api_url: 'server.php',
                  task: {
                        text: null,
                        done: false
                  },
            }
      },
      methods: {
            readTasks(url) {
                  axios.get(url).then(response => {
                        this.tasks = response.data

                  }).catch(err => {
                        console.log(err.message);
                  })
            },
            addTask() {
                  const data = {
                        task: this.task.text,
                  }

                  axios
                        .post(this.api_url, data, {
                              headers: { 'Content-Type': 'multipart/form-data' }
                        })
                        .then((response) => {
                              this.tasks = response.data

                        }).catch(err => {
                              console.log(err.message);
                        })
            },
            done(index) {
                  const data = {
                        done: index,
                  }

                  axios
                        .post(this.api_url, data, {
                              headers: { 'Content-Type': 'multipart/form-data' }
                        })
                        .then((response) => {
                              this.tasks = response.data

                        }).catch(err => {
                              console.log(err.message);
                        })

            },
            changeDone(index) {
                  this.tasks[index].done = !this.tasks[index].done;
            }

      },
      mounted() {
            this.readTasks(this.api_url)
      }
}).mount('#app')