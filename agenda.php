<?php
    include "resources/functions/db_con.php";
    include "resources/functions/functions.php";

    $appointments = getAllAppointments();
    $games = getAllGames();

    if(!empty($_GET['deleted'])){
        deleteAppointment($_GET['deleted']);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="resources/css/style.css" rel="stylesheet">
    <title>Plannigstool</title>
</head>
<body>
<div class="container">
    <?php include "resources/content/nav.php"; ?>
    <section class="m-3">
        <?php foreach($appointments as $row){
            $game = $games[array_search($row['gameId'], array_column($games, 'id'))];
            ?>
            <div class="row dark-bg text-white text-center w-100 m-0 my-1">
                <div class="col-lg-3 border border-secondary p-2 d-flex justify-content-around"><span><?php echo $row['date'];?></span><a class="text-secondary" href="update.php?appointment=<?php echo $row['id'];?>">edit</a><a class="text-danger" onclick="return confirm('Are you sure you want to delete this appointment?')" href="agenda.php?deleted=<?php echo $row['id'];?>">delete</a></div>
                <div class="col-lg-2 border border-secondary p-2"><?php echo $row['gameName'];?></div>
                <div class="col-lg-3 border border-secondary p-2"><?php echo $row['players'];?></div>
                <div class="col-lg-1 border border-secondary p-2"><?php echo $row['instructor'];?></div>
                <div class="col-lg-2 border border-secondary p-2"><?php echo $game['play_minutes'];?> minuten</div>
                <div class="col-lg-1 border border-secondary p-2"><a class="text-secondary" href="appointment.php?id=<?php echo $row['id'];?>">detail</a></div>
            </div>
        <?php }?>
    </section>
    <?php include "resources/content/footer.php"; ?>
</div>
</body>
</html>