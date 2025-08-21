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

        <form action="plus_register.php" method="post">
            <!--<h2 class="mt-4 mb-3"><span style="font-weight: bold;">과제 등록하기</h2>-->
            <input type="hidden" name="group_id" value="<?=$group_id?>"/>
            <div class="form-floating mb-3 mt-4">
                <input type="text" class="form-control" id="floatingInput" placeholder="과제 제목" name="title">
                <label for="floatingInput">과제 제목</label>
            </div>
            <select class="form-select form-select-lg mb-3" name="sub1">
                <option selected>숙제 / 수행 / 지필</option>
                <option value="숙제">숙제</option>
                <option value="수행">수행</option>
                <option value="지필">지필</option>
            </select>
            <select class="form-select form-select-lg mb-3" name="sub2">
                <option selected>과목</option>
                <option value="수학">수학</option>
                <option value="정보">정보</option>
                <option value="물리">물리</option>
                <option value="화학">화학</option>
                <option value="생명">생명</option>
                <option value="지구">지구</option>
                <option value="국어">국어</option>
                <option value="사회">사회</option>
                <option value="영어">영어</option>
                <option value="기타">기타</option>
            </select>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingPassword" placeholder="제출기한" name="deadline">
                <label for="floatingPassword">제출기한</label>
            </div>
            <button type="submit" class="btn btn-primary w-100" onclick="location.href='view.html'">과제 등록 ✍️</button>
        </form>

       <?php include 'ui_footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
