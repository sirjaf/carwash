<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/dbconn.inc.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes/func.inc.php';

    if (isset($_POST['submit'])) {
        $fix_id=mysqli_real_escape_string($conn,(int)$_POST['fix_id']);
        $fix_teamA_id = mysqli_real_escape_string($conn, (int)$_POST['teamA']);
        $fix_teamB_id = mysqli_real_escape_string($conn, (int)$_POST['teamB']);
        $fix_tournament_id = mysqli_real_escape_string($conn, (int)$_POST['tournament']);
        $fix_country_id = mysqli_real_escape_string($conn, (int)$_POST['country']);
        $fix_fTime = mysqli_real_escape_string($conn, $_POST['ftime']);
        $fix_fDate = mysqli_real_escape_string($conn, $_POST['fdate']);
        $fix_price = mysqli_real_escape_string($conn, (float)$_POST['price']);
        $fix_homepg = (int)$_POST['homepage']==1? 1:0;
       
        if (empty($fix_teamA_id) || empty($fix_teamB_id) || empty($fix_tournament_id)) {
           echo getMessageWarning("Country,Tournament,Teams,Time and Date fields must not be empty.","Empty fields");
            exit();
        } else {
            $sql = "UPDATE fixtures SET teamA_id='{$fix_teamA_id}',teamB_id='{$fix_teamB_id}',
                    tournament_id='{$fix_tournament_id}',ftime='{$fix_fTime}',fdate='{$fix_fDate}',
                    price='{$fix_price}',homepage={$fix_homepg} WHERE id=".$fix_id;
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                echo getMessageWarning("Fail to save record.Check if the record already exists","Failed");
            } else {
                echo $sql;
                echo getMessageSuccess("Record Saved Successfully","Saved");
                 echo $sql;
                 //exit();
            } 
        }  
    } else {
        header("Location: /fixtures/update_fixture.php");
        exit();
    }