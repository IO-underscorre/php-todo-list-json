<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TOBOlist</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
    <div class="page-wrapper">
        <div>
            <div class="content">
                <header>
                    <h1>
                        TOBOlist
                    </h1>
                </header>

                <main>
                    <ul class="todo-list">
                        <li class="event">
                            <h2 class="event-name">
                                testtesttesttest
                            </h2>

                            <menu class="event-options">
                                <li>
                                    <button>
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </li>

                                <li>
                                    <button>
                                        <i class="fa-solid fa-check"></i>

                                        <!-- condizione per mettere altro testo -->
                                    </button>
                                </li>

                                <li>
                                    <button>
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </li>
                            </menu>
                        </li>
                    </ul>

                    <form action="" class="new-event-form event">
                        <input type="text" placeholder="New task..." class="event-name">

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
</body>

</html>