<?php
include_once __DIR__ . '/../api/db.php';
include_once __DIR__ . '/../api/paginate.php';

list($rows, $totalPages) = paginate("product");
$page = $_GET['page'] ?? 1;
?>

<table>
    <tr>
        <td></td>
        <td>
            <h3>環境/設備圖片管理</h3>
        </td>
        <td width="200px">
            <input type="hidden" name="table"  value="place">
            <input type="button" onclick="op('#cover', '#cvr', './modal/place.php')" value="新增環境/設備圖片">
        </td>
    </tr>
</table>
<form action="./api/edit.php" method="post">
<table>
    <tr>
        <th>圖片</th>
        <th>名稱</th>
        <th>顯示</th>
        <th>刪除</th>
    </tr>
    <?php
    $rows = $Place->all(" ORDER BY created_at DESC ");
    foreach ($rows as $row):
    ?>
        <tr>
             <td>
                    <img src="./images/<?= $row['img']; ?>" style="width:100px; border-radius: 8px;">
                </td>
            <td>
                <input type="text" name="text[]" value="<?= $row['title']; ?>" style="width:90%;">
            </td>
            <td style="padding-left: 15px;">
                <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>>
            </td>
            <td style="padding-left: 15px;">
                <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
            </td>
        </tr>
        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
        <input type="hidden" name="table" value="place">
    <?php endforeach; ?>
</table>

 <table>
        <tbody>
            <tr>
                <td class="text-center">
                    <input type="submit" value="修改確定">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </tbody>
    </table>
</form>
<!-- 遮罩與彈窗容器 -->
<div id="cover" style="position: fixed; top:0; left:0; width:100%; height:100%; background-color: rgba(0,0,0,0.5); display:none; z-index: 1000;">
    <div id="cvr" style="width: 60%; margin: 5% auto; background-color: white; padding: 20px; border-radius: 12px; position: relative;">
        <!-- Modal 內容將載入這裡  彈窗本體 -->
    </div>
</div>

<script>
    function op(coverSelector, cvrSelector, url) {
        const cover = document.querySelector(coverSelector);
        const cvr = document.querySelector(cvrSelector);

        cover.style.display = 'block';
        fetch(url)
            .then(res => res.text())
            .then(html => {
                cvr.innerHTML = html;
            });

        // 點遮罩外部可關閉 modal
        cover.addEventListener('click', function(e) {
            if (e.target === cover) {
                cover.style.display = 'none';
                cvr.innerHTML = '';
            }
        });

    }
</script>