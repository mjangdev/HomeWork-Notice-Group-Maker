<?php
    $group_id = $_GET['id'];
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
  <body class="container text-center bg-white" style="max-width: 1000px">
    <div class="container text-center bg-body-tertiary">
        
        <?php
            include 'ui_header.php';
            $result = mysqli_query($conn, "select * from items where group_id = '$group_id' order by deadline asc");
        
            while($data= mysqli_fetch_array($result)){
                if($data['deleted']) continue;
                $end_date = date($data['deadline']);
                $d_day = floor((strtotime($end_date) - strtotime(date('Y-m-d'))) / 86400);
                if($d_day<0){
                    $iid = $data['item_id'];
                    $query_p = "UPDATE items SET deleted = 2 where item_id = '$iid'";
                    $result_p = $conn->query($query_p);
                    continue;
                }
        ?>   
            <div class="row mb-2 bg-secondary">
                <div class="col-2 bg-danger" style="font-size: 19px; color:white; padding-top: 9px; font-weight:bold; padding-left: 0px; padding-right: 0px;">
                    <?php
                    if($d_day==0){
                        ?>
                        D-Day
                        <?php
                    }
                    else{
                        ?>
                        D-<?=$d_day?>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-2">
                    <div class="row">
                        <?php
                        if($data['sub1']=="수행"){
                            ?>
                            <div class="col bg-primary" style="color: white; font-weight:bold">수행</div>
                            <?php
                        }
                        elseif($data['sub1']=="지필"){
                            ?>
                            <div class="col bg-info" style="color: white; font-weight:bold">지필</div>
                            <?php
                        }
                        else{
                        ?>
                            <div class="col bg-success" style="color: white; font-weight:bold">숙제</div>
                        <?php
                        } ?>
                    
                    </div>
                    <div class="row"><div class="col bg-secondary" style="color: white; font-weight:bold"><?=$data['sub2']?></div></div>
                </div>
                <div class="col-8 bg-white">
                    <div class="row"><div class="col" style="font-size: 20px; text-align:left; font-weight:900"><?=$data['title']?></div></div>
                    <div class="row"><div class="col" style="font-size: 12px; text-align:left">기한 : <?=$data['deadline']?> &nbsp; 과제ID : <?=$data['item_id']?> &nbsp;<a href="./delete.php?item_id=<?=$data['item_id']?>" style="color:red;">삭제</a></div></div>
                </div>
            </div>
          
        <?php
            }
            include 'ui_footer.php';
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
