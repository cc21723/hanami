    <style>
        .carousel-wrapper {
            width: 100%;
            max-width: 1000px;
            margin: auto;
            overflow: hidden;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.6s ease;
        }

        .carousel-img {
            height: 250px;
            width: 25%;
            /* 一排4張 */
            object-fit: cover;
            border-radius: 10px;
            flex-shrink: 0;
            padding: 5px;
        }
    </style>

    <!-- 封面圖 -->
    <div class="hero">
        <h1>🌸花見漫漫美學🌸</h1>
    </div>

    <!-- 服務項目 -->
    <div class="container services">
        <h2>🌸服務項目🌸</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <img class="service-img" src="https://i.pinimg.com/736x/73/e0/93/73e093af59a9d2944d9cd6169f37c5a6.jpg"
                    alt="美甲設計" />
                <h5 class="mt-2">美甲設計</h5>
                <p>客製設計、延甲、凝膠、基礎保養</p>
            </div>
            <div class="col-md-4 mb-4">
                <img class="service-img" src="https://i.pinimg.com/736x/84/e3/14/84e314899976b7f19db7fc94caf1466d.jpg"
                    alt="熱蠟除毛" />
                <h5 class="mt-2">熱蠟除毛</h5>
                <p>巴西式、腋下、腿部全區除毛</p>
            </div>
            <div class="col-md-4 mb-4">
                <img class="service-img" src="https://i.pinimg.com/736x/a4/76/95/a476952f9b8043c3b4e6dae3d06a9029.jpg"
                    alt="臉部保養" />
                <h5 class="mt-2">臉部保養</h5>
                <p>清潔毛孔、保濕修護、舒緩按摩</p>
            </div>
        </div>
    </div>

    <!-- 作品集 -->
    <!-- 輪播開始 -->
    <div class="container gallery text-center my-5">
        <h2>🌸作品照片🌸</h2>
        <div class="carousel-wrapper">
            <div class="carousel-track" id="track">
                <?php
                include "./api/db.php";
                $sql = "SELECT * FROM product WHERE sh=1 ORDER BY created_at DESC";
                $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                foreach ($rows as $row): ?>
                    <img src="./images/<?= htmlspecialchars($row['img']) ?>"
                        alt="<?= htmlspecialchars($row['alt']) ?>"
                        class="carousel-img">
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- 輪播結束 -->



    <!-- 工作室地址 -->
    <div class="container text-center my-5">
        <h3>🌸工作室地址🌸</h3>
        <p>📍 新北市蘆洲區民族路290巷13號1樓</p>
        <iframe class="mt-3" width="100%" height="250" frameborder="0" style="border:0"
            src="https://www.google.com/maps?q=新北市蘆洲區民族路290巷13號1樓&output=embed" allowfullscreen></iframe>
    </div>

    <script>
        const track = document.getElementById("track");
        const slides = document.querySelectorAll(".carousel-img");
        const total = slides.length;
        let index = 0;

        //  複製前 4 張到尾端，確保輪播時永遠有東西補上
        for (let i = 0; i < 4; i++) {
            if (slides[i]) {
                track.appendChild(slides[i].cloneNode(true));
            }
        }

        setInterval(() => {
            index++;
            track.style.transition = "transform 0.6s ease";
            track.style.transform = `translateX(-${index * 25}%)`;

            // 當滑到最後補的第 4 張，瞬間跳回真正的第一張
            if (index >= total) {
                setTimeout(() => {
                    track.style.transition = "none";
                    track.style.transform = "translateX(0)";
                    index = 0;
                }, 600);
            }
        }, 3000);
    </script>