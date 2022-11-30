<!doctype html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- BOOTSTRAP -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
      <!-- FONT AWESOME -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- CSS -->
      <link rel="stylesheet" href="./assets/css/style.css">
      <title>Todo List</title>
      <title>PHP ToDo List JSON</title>
</head>

<body id="body">
      <div id="app" class="d-flex align-items-center text-uppercase">
            <div class="container d-flex justify-content-center">
                  <div class="addTask mx-4">
                        <h3 class="lightning">Aggiungi alla lista</h3>
                        <input type="text" v-model="task.name" @keyup.enter="addTask" class="form-label p-2" name="task">
                        <button @click="addTask" type="submit" class="btn btn-primary mx-4">Aggiungi</button>
                        <small v-show="error" class="text-danger error">Devi inserire almeno 5 caratteri</small>
                        <div class="legend">
                              <h5 class="text_uppercase lightning">legenda</h5>
                              <ul class="list-group w-50 text-uppercase">
                                    <li class="list-group-item bg_todo">gia fatto</li>
                                    <li class="list-group-item">da fare</li>
                                    <li class="list-group-item">
                                          <i class="fa-solid fa-circle-xmark"></i>
                                          rimuovi
                                    </li>
                              </ul>
                        </div>
                  </div>
                  <div class="class_list mx-4">
                        <h3 class="lightning text-uppercase text-center">Lista delle cose da fare</h3>
                        <ul class="list-group">
                              <li v-for="(task, index) in tasks" :class=" task.done === true ? 'text_through list-group-item bg_todo' : 'list-group-item' " @click="changeDone(index)">{{task.text}}
                                    <i class="fa-solid fa-circle-xmark icon_x" @click.stop="done(index)"></i>
                              </li>
                        </ul>
                  </div>
            </div>
      </div>
      <!-- SCRIPT -->
      <!-- CDN AXIOS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
      <script src="./assets/js/app.js"></script>
</body>

</html>