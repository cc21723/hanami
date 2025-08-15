<?php include_once "../api/db.php" ?>
<style>
    .about-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 0.5rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="container my-5">
    <section>
        <h2 class="mb-4" style="color:#c44a7c;">關於我</h2>

        <!-- 個人/團隊介紹 -->
        <article class="mb-5">
            <h3>個人/團隊介紹</h3>
            <p>
                花見漫漫美學由 美甲師 Kimi 創立，擁有超過8年美甲及美容經驗。團隊專注於打造獨一無二的指尖藝術，並持續進修最新美甲技術與保養知識，致力於為每位客戶提供專業且貼心的服務。
            </p>
        </article>

        <!-- 工作室理念與風格 -->
        <article class="mb-5">
            <h3>工作室理念與風格</h3>
            <p>
                我們相信美麗來自細節的用心，工作室以日系溫暖柔和的花見風格為主軸，營造放鬆舒適的空間，讓每位來賓都能在輕鬆愉悅的氛圍中享受專屬的美麗時光。
            </p>
        </article>

        <!-- 設備與環境展示 -->

        <article class="mb-5">
            <h3>設備與環境展示</h3>
            <div class="row g-3">
                <?php
                $rows = $Place->all(['sh' => 1]);
                foreach ($rows as $row):
                ?>
                    <div class="col-md-4">
                        <img src="./images/<?= $row['img']; ?>" class="about-img img-fluid rounded shadow-sm" alt="工作室環境">
                    </div>
                <?php endforeach; ?>
            </div>
        </article>

        <!-- 服務流程 -->
        <article class="mb-5">
            <h3>服務流程</h3>
            <ol>
                <li><strong>預約諮詢：</strong>透過 Instagram、LINE 或電話預約，告知需求與時間。</li>
                <li><strong>到店服務：</strong>專業美甲師為您介紹服務內容並確認設計風格。</li>
                <li><strong>實際操作：</strong>開始美甲／除毛／臉部保養，過程中可隨時溝通調整。</li>
                <li><strong>完成檢查：</strong>確認滿意度，並提供後續保養建議。</li>
                <li><strong>預約回訪：</strong>鼓勵定期回訪維持最佳狀態。</li>
            </ol>
        </article>

        <!-- 工作室位置 -->
        <article class="mb-5">
            <h3>工作室位置</h3>
            <p>📍 新北市蘆洲區民族路290巷13號1樓</p>
            <iframe class="mt-3" width="100%" height="250" frameborder="0" style="border:0"
                src="https://www.google.com/maps?q=新北市蘆洲區民族路290巷13號1樓&output=embed" allowfullscreen>
            </iframe>
        </article>

        <!-- 聯絡方式 -->
        <article class="mb-5">
            <h3>聯絡方式</h3>
            <p>LINE ID：<a href="https://page.line.me/051eykwb" target="_blank" rel="noopener"
                    style="color:#00c300;">加入花見漫漫美學 LINE</a></p>
            <p>Instagram 預約：<a href="https://www.instagram.com/hanami.igtw/" target="_blank" rel="noopener"
                    style="color:#f68ab1;">hanami.igtw</a></p>
        </article>
    </section>
</div>