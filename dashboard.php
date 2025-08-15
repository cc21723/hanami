<?php
include_once "./api/db.php";
session_start();

$user = $User->find(['acc' => $_SESSION['user']['acc']]);
$userName = $user['userName'] ?? '錯誤';

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <title>花見漫漫｜後台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        body {
            background: #fff0f5;
            font-family: 'Segoe UI', sans-serif;
        }
        a{
            text-decoration: none;
            color: #e91e63;
        }

        /* 左側直欄樣式 */
        .sidebar {
            background-color: #fce4ec;
            padding: 2rem 1rem;
            width: 250px;
            min-height: 100vh;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            font-weight: bold;
            color: #e91e63;
            margin-bottom: 2rem;
            text-align: center;
            
        }

        .sidebar .menu a,
        .sidebar .logout {
            display: block;
            padding: 0.75rem 1rem;
            margin: 0.25rem 0;
            color: #880e4f;
            background-color: #f8bbd0;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar .menu a:hover,
        .sidebar .logout:hover {
            background-color: #f48fb1;
            color: #fff;
        }

        .main-content {
            flex-grow: 1;
            padding: 2rem;
        }

        /* 主區 */
        .main-content {
            flex: 1;
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            background-color: #fff0f5;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-top: 20px;
            font-size: 15px;
        }

        table th,
        table td {
            padding: 12px 16px;
            text-align: left;
        }

        table th {
            background-color: #f8bbd0;
            color: #880e4f;
            font-weight: bold;
            border-bottom: 2px solid #f48fb1;
        }

        table td {
            background-color: #fff;
            color: #333;
            vertical-align: middle;
            border-bottom: 1px solid #fce4ec;
        }

        table tr:hover td {
            background-color: #ffe3ec;
        }

        input[type="text"] {
            border: 1px solid #f8bbd0;
            padding: 6px 10px;
            border-radius: 6px;
            width: 100%;
        }

        input[type="submit"],
        input[type="reset"],
        input[type="button"] {
            padding: 8px 16px;
            border-radius: 8px;
            background-color: #f48fb1;
            border: none;
            color: white;
            font-weight: bold;
            margin: 5px;
            transition: background-color 0.2s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover,
        input[type="button"]:hover {
            background-color: #e57373;
        }

        /* 美化分頁元件 */
        .pagination {
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pagination .page-item {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .pagination .page-link {
            border: none;
            background-color: #fceff1;
            /* 淺粉色 */
            color: #d75d75;
            /* 主色文字 */
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination .page-link:hover {
            background-color: #f9d9de;
            color: #a02f4d;
            text-decoration: none;
        }

        .pagination .page-item.active .page-link {
            background-color: #e16b8c;
            /* 主色 */
            color: white;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }


        /* 手機版隱藏左側選單 */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
        }

        /* offcanvas 樣式 */
        .offcanvas-header {
            background-color: #f8bbd0;
        }

        .offcanvas-body a {
            display: block;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            background-color: #fce4ec;
            color: #880e4f;
            border-radius: 0.5rem;
            text-decoration: none;
        }

        .offcanvas-body a:hover {
            background-color: #f48fb1;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- 手機版漢堡按鈕 -->
    <button class="btn btn-danger d-md-none m-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
        ☰
    </button>

    <div class="d-flex">
        <!-- 左側直欄（電腦版） -->
        <div class="sidebar d-none d-md-block">
            <h3><a href="./dashboard.php">後台管理</a></h3>
            <div class="menu">
                <a href="./index.php">前台首頁</a>
                <a href="./dashboard.php">後台首頁</a>
                <a href="?do=product" class="menu-ajax" data-page="product">作品集照片</a>
                <a href="?do=place" class="menu-ajax" data-page="place">環境/設備照片</a>
                <a href="?do=reserve" class="menu-ajax" data-page="reserve">預約時間圖片</a>
                <a href="?do=users" class="menu-ajax" data-page="users">使用者管理</a>
            </div>
            <a href="./api/logout.php" class="logout">登出</a>
        </div>

        <!-- 主要內容區 -->
        <main class="main-content">
            <?php
            $do = $_GET['do'] ?? 'main';
            $file = "./backend/" . $do . ".php";
            if (file_exists($file)) {
                include $file;
            } else {
                include './backend/main.php';
            }
            ?>
        </main>
    </div>

    <!-- Bootstrap 5 Offcanvas（手機版側欄） -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">選單</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="./index.php">前台首頁</a>
            <a href="./dashboard.php">後台首頁</a>
            <a href="?do=product" class="menu-ajax" data-page="product">作品集照片</a>
            <a href="?do=place" class="menu-ajax" data-page="place">環境/設備照片</a>
            <a href="?do=reserve" class="menu-ajax" data-page="reserve">預約時間圖片</a>
            <a href="?do=users" class="menu-ajax" data-page="users">使用者管理</a>
            <a href="./api/logout.php" class="logout">登出</a>
        </div>
    </div>

    <!-- AJAX Menu -->
    <script>
        $(document).ready(function() {
            $(".menu-ajax").on("click", function(e) {
                e.preventDefault();

                const page = $(this).data("page");
                const url = `dashboard.php?do=${page}`;

                history.pushState(null, null, url); // ✅ 更新網址

                $(".main-content").fadeOut(100, function() {
                    $(".main-content").load(`./backend/${page}.php`, function() {
                        $(".main-content").fadeIn(200);
                    });
                });
            });

            // ✅ 處理瀏覽器返回/前進按鈕的情況
            window.onpopstate = function() {
                const urlParams = new URLSearchParams(window.location.search);
                const page = urlParams.get('do') || 'main';

                $("#main-content").fadeOut(100, function() {
                    $(".main-content").load(`./backend/${page}.php`, function() {
                        $(".main-content").fadeIn(200);
                    });
                });
            };

        });
    </script>

</body>

</html>