<?php 
    $group_id = $_POST['group_id'];
    $title = $_POST['title'];
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $deadline = $_POST['deadline'];
    $creation_datetime = date("Y-m-d H:i:s", time());
    include 'db_con.php';
    while(1){
        $item_id = mt_rand(10000, 99999);
        $sql = "select * from items where item_id = '$item_id'";
        $result = mysqli_query($conn, $sql);
        $info= mysqli_fetch_array($result);
        if($info == NULL) break;
    }
    

    //echo $group_id;


    $plus = "insert into items (group_id, item_id, title, sub1, sub2, deadline, creation_datetime ) VALUES ('$group_id', '$item_id' , '$title', '$sub1', '$sub2', '$deadline', '$creation_datetime' )";
    if(mysqli_query( $conn, $plus )){ ?>
        <script>
        alert('과제 등록이 완료되었어요. 👍');
        location.href = 'http://hw.minseo.net/view.php?id=<?=$group_id?>';
        </script>
    <?php 
        exit;
    }
    ?>
        <script>
        alert('과제 등록에 실패하였어요. 😢');
        location.href = 'http://hw.minseo.net/plus.php?group_id=<?=$group_id?>';
        </script>
    <?
?>