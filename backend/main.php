<?php

$user = $User->find(['acc' => $_SESSION['user']['acc']]);
$userName = $user['userName'] ?? '錯誤';

?>

<style>
    body {
        background-color: #fff5f8;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .dashboard-card {
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        background-color: #ffffff;
    }

    .dashboard-icon {
        font-size: 2rem;
    }
</style>

<div class="container my-5">
    <h1 class="mb-4">🌸 歡迎回來，<?= htmlspecialchars($userName) ?>！</h1>

    <div class="row">
        <div class="col-12 col-md-4 ">
            <div class="dashboard-card text-center">
                <div class="dashboard-icon">📸</div>
                <h5 class="mt-2">作品數</h5>
                <p class="text-muted">
                    <?= $Product->count(['sh' => '1']); ?>
                </p>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="dashboard-card text-center">
                <div class="dashboard-icon">📅</div>
                <h5 class="mt-2">本日代辦事項</h5>
                <p class="text-muted"><?= $Todo->count(['completed' => '0']); ?> 筆</p>
            </div>
        </div>
        <!-- <div class="col-md-3">
            <div class="dashboard-card text-center">
                <div class="dashboard-icon">💬</div>
                <h5 class="mt-2">留言回饋</h5>
                <p class="text-muted">3 則</p>
            </div>
        </div> -->
        <div class="col-12 col-md-4">
            <div class="dashboard-card text-center">
                <div class="dashboard-icon">⚙️</div>
                <h5 class="mt-2">快速操作</h5>
                <a href="?do=product" class="btn btn-outline-danger btn-sm mt-2 menu-ajax" data-page="product">新增作品</a>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <h4>🕒 最新預約紀錄</h4>
    <!-- 加在 <body> 中的某個位置 -->
    <div class="container my-5">
        <h4 class="mb-4">📝 今日代辦事項</h4>

        <div class="input-group mb-3 shadow-sm">
            <span class="input-group-text">待辦事項</span>
            <input type="text" id="newTodo" class="form-control" placeholder="輸入一項任務...">
            <button id="addTodoBtn" class="btn btn-danger text-white">新增</button>
        </div>

        <div class="card shadow-sm">
            <ul id="todoList" class="list-group list-group-flush"></ul>

            <div class="card-footer text-muted d-flex justify-content-between">
                <small id="todoCount"></small>
                <a href="#" id="clearAll" class="text-danger small">清除所有任務</a>
            </div>
        </div>
    </div>
    
    <script>
        function loadTodos() {
            $.get('./api/todoget.php', function(data) {
                const todos = data;
                let html = '';
                let count = 0;

                todos.forEach(todo => {
                    const checked = todo.completed == 1 ? 'checked' : '';
                    const strike = todo.completed == 1 ? 'text-decoration-line-through text-muted' : '';
                    if (todo.completed == 0) count++;

                    html += `
                        <li class="list-group-item d-flex align-items-center" data-id="${todo.id}">
                        <input type="checkbox" class="form-check-input me-2 toggle-complete" ${checked}>
                        <span class="flex-grow-1 ${strike}">${todo.title}</span>
                        <button class="btn btn-sm btn-outline-secondary editTodo">✏️</button>
                        <button class="btn btn-sm btn-outline-danger ms-2 deleteTodo">🗑️</button>
                        </li>`;
                });

                $('#todoList').html(html);
                $('#todoCount').text(`還有 ${count} 筆任務未完成`);
            });
        }

        $(document).ready(function() {
            loadTodos();

            // 新增
            $('#addTodoBtn').click(function() {
                const title = $('#newTodo').val().trim();
                if (!title) return;
                $.post('./api/todoadd.php', {
                    title
                }, function(res) {
                    $('#newTodo').val('');
                    loadTodos();
                });
            });

            // 勾選完成狀態
            $('#todoList').on('change', '.toggle-complete', function() {
                const checkbox = $(this);
                const li = checkbox.closest('li');
                const id = li.data('id');
                const completed = checkbox.prop('checked') ? 1 : 0;

                checkbox.prop('disabled', true);

                $.post('./api/todoupdate.php', {
                    id,
                    completed
                }, function() {
                    // ✅ 只更新目前這個 li 的樣式，不整個重載
                    loadTodos();
                    const titleSpan = li.find('span');

                    if (completed) {
                        titleSpan.addClass('text-decoration-line-through text-muted');
                    } else {
                        titleSpan.removeClass('text-decoration-line-through text-muted');
                    }

                    checkbox.prop('disabled', false);
                });
            });


            // 編輯
            $('#todoList').on('click', '.editTodo', function() {
                const li = $(this).closest('li');
                const id = li.data('id');
                const currentTitle = li.find('span').text();
                const newTitle = prompt('修改任務內容：', currentTitle);
                if (newTitle && newTitle.trim() !== '') {
                    $.post('./api/todoupdate.php', {
                        id,
                        title: newTitle.trim()
                    }, loadTodos);
                }
            });

            // 刪除
            $('#todoList').on('click', '.deleteTodo', function() {
                const id = $(this).closest('li').data('id');
                $.post('./api/tododelete.php', {
                    id
                }, loadTodos);
            });

            // 清除所有
            $('#clearAll').click(function(e) {
                e.preventDefault();
                if (confirm('確定清空所有任務？')) {
                    $.get('./api/todoget.php', function(data) {
                        const todos = JSON.parse(data);
                        todos.forEach(todo => {
                            $.post('./api/tododelete.php', {
                                id: todo.id
                            });
                        });
                        setTimeout(loadTodos, 500);
                    });
                }
            });
        });
    </script>