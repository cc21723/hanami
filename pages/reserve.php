<?php include_once "../api/db.php" ?>
<div class="row">
    <!-- 左：預約表單 -->
    <div class="col-md-7">
        <h2 class="mb-4" style="color:#c44a7c;">線上預約表單</h2>
        <form id="bookingForm">
            <div class="mb-3">
                <label for="name" class="form-label">中文全名</label>
                <input type="text" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">電話</label>
                <input type="tel" class="form-control" id="phone" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">預約日期</label>
                <input type="date" class="form-control" id="date" required>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">預約時間</label>
                <input type="time" class="form-control" id="time" required>
            </div>

            <div class="mb-3">
                <label for="style-image" class="form-label">款式(傳圖報價限三張)</label>
                <input type="file" class="form-control" id="style-image" accept="image/*" multiple>
                <div class="form-text">最多上傳三張圖片</div>
            </div>

            <div class="mb-3">
                <label class="form-label">有無延甲</label>
                <select class="form-select" required>
                    <option value="">請選擇</option>
                    <option>無</option>
                    <option>有</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">是否需卸甲</label>
                <select class="form-select" required>
                    <option value="">請選擇</option>
                    <option>不需要</option>
                    <option>需要（本店）</option>
                    <option>需要（他店）</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="referrer" class="form-label">推薦人</label>
                <input type="text" class="form-control" id="referrer">
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">備註</label>
                <textarea class="form-control" id="notes" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-danger px-4">送出預約</button>
        </form>
    </div>

    <!-- 右：預約說明圖片 -->
    <div class="col-md-5">
        <h5 class="mb-3">預約說明</h5>
        <p class="mt-3" style="font-size: 1rem; color: #666;">
            預約時段建議提前三天聯絡。
        </p>
        <p class="mt-3" style="font-size: 1rem; color: #666;">若臨時取消請提前至少24小時告知，感謝您的配合。</p>

        <?php
        $row = $Reserve->find(['sh' => 1]);
        if ($row):
        ?>
            <div class="row g-3">
                <div class="col-md-12">
                    <img src="./images/<?= $row['img']; ?>" class="img-fluid rounded shadow-sm" alt="預約時段說明">
                </div>
            </div>

        <?php endif; ?>
        <!-- <img src="https://i.pinimg.com/736x/e8/34/73/e834738634c757b09ec48013e304a52e.jpg" alt="預約時段說明"
            class="img-fluid rounded shadow-sm"> -->
    </div>
</div>

<script>
    $(function() {
        $('#bookingForm').on('submit', function(e) {
            e.preventDefault(); // 阻止表單真正送出

            // 模擬成功（你也可以在這裡加入 Ajax 傳送）
            $('#successModal').modal('show');

            // 如果你要清空表單可以加這行
            this.reset();
        });
    });
</script>