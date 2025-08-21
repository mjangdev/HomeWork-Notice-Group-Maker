<?php 
    $group_id = $_POST['group_id'];
    $group_pw = $_POST['group_pw'];
    include 'db_con.php';

    $sql = "select * from teams where group_id = '$group_id'";
    $result = mysqli_query($conn, $sql);
    $groupInfo= mysqli_fetch_array($result);
    $group_pw_o = $groupInfo['group_pw'];
    ?>

    <?php
    if($group_pw !== $group_pw_o){ ?>
        <script>
        alert('관리자PW가 틀렸어요. 😢');
        location.href = document.referrer;
        </script>
    <?php
        exit;
    }

    $nsql = "UPDATE teams SET ban = 1 where group_id = '$group_id'";
    if(mysqli_query( $conn, $nsql )){ ?>
        <script>
        alert('그룹 삭제가 완료되었어요. 👍');
        location.href = 'http://hw.minseo.net';
        </script>
    <?php 
        exit;
    }
    ?>
        <script>
        alert('그룹 삭제에 실패하였어요. 😢');
        location.href = document.referrer;
        </script>
    <?
?>