  <?php include_once "../api/db.php" ?>

  <div class="container my-5">
    <h2 class="text-center mb-4">作品集</h2>

    <!-- 分類按鈕 -->
    <div class="text-center mb-4">
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="all">全部</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="nail-a">預算設計 A</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="nail-b">預算設計 B</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="wax">熱蠟除毛</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="face">臉部保養</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="moxa">艾草溫罐</button>
    </div>

    <!-- 圖片區 -->
    <div class="row g-3" id="gallery">
      <?php
      $rows = $Product->all(['sh' => '1']);
      foreach ($rows as $row):
        // dd($row);
        // 根據 alt 決定分類類別 class
        $altClass = '';
        switch ($row['alt']) {
          case '預算設計 A':
            $altClass = 'nail-a';
            break;
          case '預算設計 B':
            $altClass = 'nail-b';
            break;
          case '熱蠟除毛':
            $altClass = 'wax';
            break;
          case '臉部保養':
            $altClass = 'face';
            break;
          case '艾草溫罐':
            $altClass = 'moxa';
            break;
          default:
            $altClass = 'other'; // fallback 類別
            break;
        }
      ?>
        <div class="col-sm-6 col-md-4 gallery-item <?= $altClass ?>">
          <img src="./images/<?= $row['img']; ?>" class="img-fluid rounded" alt="<?= $row['alt']; ?>">
        </div>
      <?php endforeach; ?>

      <!-- 下面要拿掉 -->
      <!-- 熱蠟除毛 -->
      <div class="col-sm-6 col-md-4 gallery-item wax">
        <img src="https://i.pinimg.com/736x/f6/8d/1f/f68d1f063b3ccae104a49a988b769e08.jpg" class="img-fluid rounded" alt="熱蠟除毛">
      </div>

      <!-- 臉部保養 -->
      <div class="col-sm-6 col-md-4 gallery-item face">
        <img src="https://i.pinimg.com/736x/0e/69/18/0e69187bd6270d5f246d2e77c6ba0d33.jpg" class="img-fluid rounded" alt="臉部保養">
      </div>
      <div class="col-sm-6 col-md-4 gallery-item face">
        <img src="https://i.pinimg.com/736x/5f/2e/cd/5f2ecd5c224957d0053c57ce3b01a081.jpg" class="img-fluid rounded" alt="臉部保養">
      </div>

      <!-- 艾草溫罐 -->
      <div class="col-sm-6 col-md-4 gallery-item moxa">
        <img src="https://i.pinimg.com/736x/f6/5a/6b/f65a6b0b3704ed8716bb67e680b780ec.jpg" class="img-fluid rounded" alt="艾草溫罐">
      </div>
    </div>

  </div>

  <script>
    $(function() {
      $(".filter-btn").click(function() {
        const filter = $(this).data("filter");
        if (filter === "all") {
          $(".gallery-item").show();
        } else {
          $(".gallery-item").hide();
          $("." + filter).show();
        }
      });
    });
  </script>