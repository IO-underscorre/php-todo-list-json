const { createApp } = Vue;

createApp({
    data() {
        return {
            apiURL: 'server/server.php',

            todoList: [],

            highlightedTaskIndex: 0,
            isOverlayOpen: false,

            taskInputed: {
                title: '',
                description: ''
            },

            hasInputError: false,
            hasServerError: false
        }
    },

    methods: {
        getAPI() {
            axios.get(this.apiURL)
                .then(callResponse => {
                    this.todoList = callResponse.data;
                    this.hasServerError = false;
                }).catch(error => {
                    this.hasServerError = true;
                })
        },

        highlightTask(index) {
            this.highlightedTaskIndex = index;
            this.isOverlayOpen = true;
        },

        addNewTask() {
            if (/[A-Za-zÀ-ÖØ-öø-ÿ0-9]{3,}/i.test(this.taskTitleInputed)) {
                for (const key in this.taskInputed) {
                    this.taskInputed[key] = this.taskInputed[key].replace(/\s+/g, ' ').trim();
                }

                const data = new FormData();
                data.append('newTask', JSON.stringify(this.taskInputed));

                axios.post(this.apiURL, data)
                    .then(callResponse => {
                        this.todoList = callResponse.data;
                        this.taskInputed.title = '';
                        this.taskInputed.description = '';
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
            if (commandString === 'remove') {
                this.isOverlayOpen = false
            }

            const data = new FormData();
            data.append(`${commandString}AtIndex`, indexOfTask);

            axios.post(this.apiURL, data)
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