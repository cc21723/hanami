<?php
session_start();
?>

<!doctype html>
<html lang="zh-Hant">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="花見漫漫美學 提供美甲、熱蠟除毛、臉部保養等服務，位於新北蘆洲，打造屬於妳的療癒空間。">
    <meta name="keywords" content="蘆洲美甲, 熱蠟除毛, 臉部保養, 花見漫漫, 指甲藝術, 新北美甲推薦, 手足保養, 花見漫漫美學">
    <meta name="author" content="花見漫漫美學 Hanami Nails">
    <title>花見漫漫美學 | Hanami Nails | 蘆洲美甲・除毛・臉部保養</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- JSON-LD 結構化資料 -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BeautySalon",
            "name": "花見漫漫美學",
            "image": "https://cc21723.github.io/hanami_nails/images/shop-front.jpg",
            "url": "https://cc21723.github.io/hanami_nails/",
            "telephone": "+886-912345678",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "民族路290巷13號1樓",
                "addressLocality": "蘆洲區",
                "addressRegion": "新北市",
                "postalCode": "247",
                "addressCountry": "TW"
            },
            "description": "花見漫漫美學 Hanami Nails 提供蘆洲地區專業美甲、熱蠟除毛、臉部保養等服務，打造屬於妳的療癒空間。",
            "openingHours": "Mo-Su 11:00-20:00",
            "priceRange": "$$",
            "areaServed": "新北市, 蘆洲區",
            "sameAs": [
                "https://www.instagram.com/hanami.igtw/",
                "https://page.line.me/051eykwb" // 可填入官方 LINE
            ]
        }
    </script>
    <style>
        body {
            font-family: 'Zen Maru Gothic', serif;
            background: linear-gradient(to bottom, #fffafc, #ffeef3);
            color: #4a3c38;
        }

        /* 導覽列背景、陰影、圓角 */
        .navbar {
            background: linear-gradient(135deg, #fce4ec, #f8bbd0);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-bottom-left-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 0.5rem 1rem;
        }

        /* 漢堡按鈕邊框與圖示 */
        .navbar-toggler {
            border: 2px solid #f8bbd0 !important;
            border-radius: 0.5rem;
            background-color: #fff0f5;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23872657' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(135, 38, 87, 0.9)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* 品牌文字 */
        .navbar-brand{
            font-weight: bold;
            font-size: 1.7rem;
            color: #872657 !important;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(255, 192, 203, 0.5);
        }

        /* 導覽連結樣式 */
        .nav-link {
            color: #872657 !important;
            font-size: 1.1rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            border-radius: 0.75rem;
        }

        /* Hover 效果 */
        .nav-link:hover {
            background: rgba(255, 192, 203, 0.3);
            color: #e16b8c !important;
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(225, 107, 140, 0.2);
        }

        /* 導覽列容器調整排版 */
        .navbar-nav {
            align-items: center;
            justify-content: flex-end;
        }

        .hero {
            /* background: url('https://i.pinimg.com/736x/04/8f/7a/048f7a42408065c7eb36093d4d173e71.jpg') no-repeat center center/cover; */
            height: 20vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }


        .hero h1 {
            font-size: 2rem;
            background-color: rgba(255, 204, 229, 0.6);
            padding: 0.6em 1.2em;
            border-radius: 25px;
            backdrop-filter: blur(3px);
        }

        .services {
            background-color: #fff0f5;
            padding: 3rem 1rem;
            border-radius: 20px;
            margin-top: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .services h2,
        .gallery h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #c44a7c;
        }

        .service-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .service-img:hover {
            transform: scale(1.05);
        }

        .gallery-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .footer {
            background-color: #ffe0ec;
            padding: 2rem 0;
            text-align: center;
            margin-top: 3rem;
        }

        .ig-float-btn,
        .line-float-btn {
            position: fixed;
            bottom: 30px;
            z-index: 999;
            border-radius: 50px;
            padding: 12px 18px;
            font-weight: bold;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            transition: background-color 0.3s ease;
            color: white;
        }

        .ig-float-btn {
            right: 30px;
            background-color: #f68ab1;
        }

        .ig-float-btn:hover {
            background-color: #d85c93;
        }

        .line-float-btn {
            left: 30px;
            background-color: #00c300;
        }

        .line-float-btn:hover {
            background-color: #009e00;
        }

        /*作品集*/
        .gallery-item img {
            width: 100%;
            /* 佔滿容器寬度 */
            height: 250px;
            /* 固定高度 */
            object-fit: cover;
            /* 內容裁切，不變形 */
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .gallery-item img:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <!-- 導覽列 -->
    <!-- <div id="navbar-placeholder"></div> -->
    <?php
    include_once "./modal/navbar.php";
    ?>
    <!-- 主內容區塊：點擊導覽列時只更新這區 -->
    <main id="main-content" class="container py-4">
        <?php
        include_once "./pages/home.php";
        ?>
    </main>

    <!-- 頁尾 -->
    <!-- <div id="footer-placeholder"></div> -->
    <?php
    include_once "./modal/footer.php";
    ?>

    <!-- 浮動按鈕 -->
    <a href="https://www.instagram.com/hanami.igtw/" class="ig-float-btn" target="_blank">💅 預約 IG</a>
    <a href="https://page.line.me/051eykwb" class="line-float-btn" target="_blank">📱 加我 LINE</a>



    <!-- 預約完成 Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100" id="successModalLabel">預約成功</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="關閉"></button>
                </div>
                <div class="modal-body">
                    <p>感謝您的預約！我們將盡快與您聯繫確認時段。</p>
                    <img src="https://i.pinimg.com/736x/3a/20/a0/3a20a0906650eb759921d6d055aefbf0.jpg" alt="成功插圖"
                        class="img-fluid rounded" style="max-height: 150px;">
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">關閉</button>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 載入共用區塊與主內容 -->
    <script>
        $(document).ready(function() {
            $(".nav-ajax").on("click", function(e) {
                e.preventDefault();

                const page = $(this).data("page");
                $("#main-content").fadeOut(100, function() {
                    $("#main-content").load("./pages/" + page + ".php", function() {
                        $("#main-content").fadeIn(200);
                    });
                });
            });
        });
    </script>

</body>

</html>