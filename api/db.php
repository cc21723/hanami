<?php
// 啟用 session 時可使用 login.php 開啟
// session_start();

// 設定時區
date_default_timezone_set("Asia/Taipei");

// 資料庫連線參數
$host = 'localhost'; 
$db   = 'hanami';    
$user = 'root';      
$pass = '';          

// $host = 'wda.mackliu.com'; 
// $db   = 's1140215';     
// $user = 's1140215';       
// $pass = 's1140215';           

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("連線失敗: " . $e->getMessage());
}

// 查詢簡化函式（快速使用）
function q($sql)
{
    global $pdo;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// 陣列印出
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

// 導頁
function to($url)
{
    header("location:" . $url);
    exit;
}

// 資料表操作類別
class DB
{
    private $pdo;
    private $table;

    function __construct($table)
    {
        global $pdo; // 使用外部定義的全域連線
        $this->pdo = $pdo;
        $this->table = $table;
    }

    function all(...$arg)
    {
        $sql = "SELECT * FROM $this->table";

        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->arraytosql($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$arg)
    {
        $sql = "SELECT COUNT(*) FROM $this->table";

        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->arraytosql($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($id)
    {
        $sql = "SELECT * FROM $this->table ";

        if (is_array($id)) {
            $tmp = $this->arraytosql($id);
            $sql .= " WHERE " . join(" AND ", $tmp);
        } else {
            $sql .= " WHERE `id` = '$id'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($array)
    {
        if (isset($array['id'])) {
            // update
            $sql = "UPDATE $this->table SET ";
            $tmp = $this->arraytosql($array);
            $sql .= join(" , ", $tmp) . " WHERE `id` = '{$array['id']}'";
        } else {
            // insert
            $cols = join("`,`", array_keys($array));
            $values = join("','", array_values($array));
            $sql = "INSERT INTO $this->table (`$cols`) VALUES ('$values')";
        }

        // return 資料成功與否
        return $this->pdo->query($sql);
    }

    function del($id)
    {
        $sql = "DELETE FROM $this->table";

        if (is_array($id)) {
            $tmp = $this->arraytosql($id);
            $sql .= " WHERE " . join(" AND ", $tmp);
        } else {
            $sql .= " WHERE `id` = '$id'";
        }

        return $this->pdo->exec($sql);
    }

    private function arraytosql($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
    }
}

// ✅ 實體化
$Product = new DB('product');
$Place = new DB('place');
$Reserve = new DB('reserve');
$User = new DB('users');
$Todo = new DB('todo');
