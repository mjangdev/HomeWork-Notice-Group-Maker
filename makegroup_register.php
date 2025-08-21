<?php 
    $group_id = $_POST['group_id'];
    $group_name = $_POST['group_name'];
    $group_pw = $_POST['group_pw'];
    include 'db_con.php';

    if($group_name == NULL || $group_id == NULL || $group_pw == NULL){?>
        <script>
        alert('아직 채우지 않은 칸이 있어요. 😲');
        location.href = 'http://hw.minseo.net/makegroup.php';
        </script>
    <?php 
        exit;
    }

    $sql = "select * from teams where group_id = '$group_id'";
    $result = mysqli_query($conn, $sql);
    $info= mysqli_fetch_array($result);
    if($info != NULL){?>
        <script>
        alert('해당 그룹ID는 이미 사용중이에요. 😢');
        location.href = 'http://hw.minseo.net/makegroup.php';
        </script>
    <?php 
        exit;
    }

    $plus = "insert into teams (group_id, group_name, group_pw ) VALUES ('$group_id', '$group_name' , '$group_pw')";
    if(mysqli_query( $conn, $plus )){ ?>
        <script>
        alert('그룹을 성공적으로 만들었어요! 👍');
        location.href = 'http://hw.minseo.net/view.php?id=<?=$group_id?>';
        </script>
    <?php 
        exit;
    }
    ?>
        <script>
        alert('그룹 등록에 실패하였어요. 😢');
        location.href = 'http://hw.minseo.net/makegroup.php';
        </script>
    <?
?>