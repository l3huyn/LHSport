<?php
require "config.php";
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'SELECT id from admin';
    $result = $conn->query($sql);
    $kq = 0;
    while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
        foreach ($rows as $item) {
            if ($id == $item['id']) {
                $kq = 1;
            }
        }
    }
    if ($kq == 0) {
        redirect("?mod=admin&act=showadmin");
        die();
    }
    $sql = "DELETE FROM admin where id = $id";
    $conn->exec($sql);
    $_SESSION['deleteadmin'] = "<div class='text-success mb-3'><b>Xóa admin thành công</b></div>";
    redirect("?mod=admin&act=showadmin");
} else {
    redirect("?mod=admin&act=showadmin");
    die();
}
