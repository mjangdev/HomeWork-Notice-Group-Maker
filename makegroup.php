<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>민서넷HW | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="text-center bg-body-tertiary">
    <div class="container mt-5">
        <form action="makegroup_register.php" method="post">
          <h1 class="mb-1"><span style="font-weight: bold;"><span class="text-primary">HW.</span>minseo.net</span></h1>
          <h1 class="mb-3"> 그룹 만들기 😲</h1>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="그룹 ID" name="group_id">
              <label for="floatingInput">그룹 ID</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="그룹 이름" name="group_name">
              <label for="floatingInput">그룹 이름</label>
          </div>
          <!-- <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="항목추가 PIN">
              <label for="floatingPassword">항목추가 PIN *항목(과제) 추가시 사용</label>
          </div> -->
          <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="관리자 PW" name="group_pw">
              <label for="floatingPassword">관리자 PW</label>
          </div>
          <button type="submit" class="btn btn-primary w-100" onclick="location.href='view.html'">그룹 만들기 🚗</button>
        </form>
    </div>
    <?php include 'ui_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
