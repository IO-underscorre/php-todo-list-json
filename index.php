<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TOBOlist</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
</head>

<body>
    <div id="app" class="page-wrapper">
        <div>
            <div class="content">
                <header>
                    <h1>
                        TOBOlist
                    </h1>
                </header>

                <main>
                    <ul class="todo-list">
                        <li class="event" v-for="(task, index) in todoList" :key="index">
                            <h2 class="event-name">
                                {{ task.title }}
                            </h2>

                            <menu class="event-options">
                                <li>
                                    <button title="Show task details">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </li>

                                <li>
                                    <button title="Uncheck task as completed" @click="editTask('toggle', index)" v-if="task.isCompleted">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>

                                    <button title="Check task as completed" @click="editTask('toggle', index)" v-else>
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </li>

                                <li>
                                    <button title="Delete task" :class="{ disabled: !task.isCompleted }" @click="editTask('remove', index)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </li>
                            </menu>
                        </li>
                    </ul>

                    <form action="" class="new-event-form event" @submit.prevent="addNewTask()">
                        <input type="text" placeholder="New task..." class="event-name" v-model="taskInputed">

                        <div class="event-options">
                            <button type="submit" title="Add new task">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="scripts/main.js"></script>
</body>

</html>