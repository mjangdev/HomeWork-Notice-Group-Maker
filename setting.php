<?php
    $group_id = $_GET['group_id'];
    include 'db_con.php';
    $sql = "select * from teams where group_id = '$group_id'";
    $result = mysqli_query($conn, $sql);
    $groupInfo= mysqli_fetch_array($result);
    $group_name = $groupInfo['group_name'];
    if($group_name == NULL || $groupInfo['ban']){
        echo "<script>alert('존재하지 않는 그룹입니다.')</script>";
        echo "<script>location.href='./'</script>";
        exit;
    }
?>


<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $group_name; ?> HW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="container text-center bg-white">
    <div class="container text-center bg-body-tertiary">
        <?php include "ui_header.php"; ?>

        <form action="setting_register.php" method="post">
            <h2 class="mt-4 mb-3"><span style="font-weight: bold;" class="text-danger">그룹 삭제하기</h2>
            <input type="hidden" name="group_id" value="<?=$group_id?>"/>
            <div class="form-floating mb-3 mt-4">
                <input type="password" class="form-control" id="floatingInput" placeholder="관리자 PW" name="group_pw">
                <label for="floatingInput">관리자 PW</label>
            </div>
            <button type="submit" class="btn btn-danger w-100" onclick="location.href='view.html'">그룹 삭제하기 🗑️</button>
        </form>

       <?php include 'ui_footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
