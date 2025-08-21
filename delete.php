<?php 
    $item_id = $_GET['item_id'];
    include 'db_con.php';
    
    $sql = "UPDATE items SET deleted = 1 where item_id = $item_id";
    if(mysqli_query( $conn, $sql )){ ?>
        <script>
        alert('과제 삭제가 완료되었어요. 👍');
        location.href = document.referrer;
        </script>
    <?php 
        exit;
    }
    ?>
        <script>
        alert('과제 삭제에 실패하였어요. 😢');
        location.href = document.referrer;
        </script>
    <?
?>