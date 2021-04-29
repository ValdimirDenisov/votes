<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Подключаем Bootstrap, чтобы не работать над дизайном проекта -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <div class="container mt-5">
            <h1>Список книг нашей библиотеки</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Наличие</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="items in books" v-bind:key='items'>
                        <th scope="row">@{{items.id}}</th>
                        <td>@{{items.title}}</td>
                        <td>@{{items.author}}</td>
                        <td>
                            <button type="button" class="btn btn-outline-primary" v-on:click="changeBookAvailability(items.id)">
                                <span v-if="items.availability == 1"> Доступна </span>
                                <span v-if="items.availability == 0"> Выдана </span>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-danger" v-on:click="deleteBook(items.id)">
                                Удалить
                            </button>
                        </td>
                    </tr>

                    <!-- Строка с полями для добавления новой книги -->
                    <tr>
                        <th scope="row">Добавить</th>
                        <td><input type="text" class="form-control" v-model="title"></td>
                        <td><input type="text" class="form-control" v-model="author"></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-outline-success" v-on:click="addBook()">
                                Добавить
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--Подключаем axios для выполнения запросов к api -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

    <!--Подключаем Vue.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>

    <script>
        let vm = new Vue({
            el: '#app',
            data: {
                books: [], 
                title: '',
                author: '',
            },
            methods: {
                loadBookList(){
                    axios.get('http://dava.loc/api/book/all')
                    .then(response =>  {
                        console.log(response)
                        this.books = response['data'];
                    });
                },
                addBook(){
                    axios({
                        method: 'POST',
                        url: 'http://dava.loc/api/book/add',
                        params: { title: this.title, author: this.author }
                    }).then((response) => {
                        console.log(response.data);
                        this.loadBookList();
                    });
                },
                deleteBook(id){
                    axios({
                        method: 'GET',
                        url: 'http://dava.loc/api/book/delete/' + id,
                    }).then((response) => {
                        console.log(response.data);
                        this.loadBookList();
                    });
                },
                changeBookAvailability(id){
                    axios({
                        method: 'GET',
                        url: 'http://dava.loc/api/book/change_availabilty/' + id,
                    }).then((response) => {
                        console.log(response.data);
                        this.loadBookList();
                    });
                }
            },
            mounted(){
                // Сразу после загрузки страницы подгружаем список книг и отображаем его
                this.loadBookList();
            }
        });
    </script>
</body>
</html>