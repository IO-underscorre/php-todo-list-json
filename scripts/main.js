const { createApp } = Vue;

createApp({
    data() {
        return {
            apiURL: 'server/server.php',

            todoList: [],

            taskInputed: '',

            hasInputError: false,
            hasServerError: false
        }
    },

    methods: {
        getAPI() {
            axios.get('server/server.php')
                .then(callResponse => {
                    this.todoList = callResponse.data;
                    this.hasServerError = false;
                }).catch(error => {
                    this.hasServerError = true;
                })
        },

        addNewTask() {
            if (/[A-Za-zÀ-ÖØ-öø-ÿ0-9]{3,}/i.test(this.taskInputed)) {
                const data = {
                    newTask: JSON.stringify({
                        title: this.taskInputed.replace(/\s+/g, ' ').trim(),
                        isCompleted: false
                    })
                };

                axios.post(this.apiURL, data, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                })
                    .then(callResponse => {
                        this.todoList = callResponse.data;
                        console.log(callResponse.data);
                        this.taskInputed = '';
                        this.hasServerError = false;
                    }).catch(error => {
                        this.hasServerError = true;
                    })
                this.hasInputError = false;
            } else {
                this.hasInputError = true;
            }
        },

        editTask(commandString, indexOfTask) {
            const data = {
                [`${commandString}AtIndex`]: indexOfTask
            }

            axios.post(this.apiURL, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then(callResponse => {
                    this.todoList = callResponse.data;
                    this.hasServerError = false;
                }).catch(error => {
                    this.hasServerError = true;
                })
        }
    },

    mounted() {
        this.getAPI();
    }
}).mount('#app')