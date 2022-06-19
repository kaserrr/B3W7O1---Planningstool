<?php
include "resources/functions/db_con.php";
include "resources/functions/functions.php";
$game = getGame($_GET['id']);

if($_SERVER['REQUEST_METHOD']=='POST'){
    appointment($game['name'],$_POST['date'], $_POST['instructor'],$_POST['players'], $game['id']);
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
        <section class="md-3">
            <div class="row border border-seconday w-100 m-0 my-1">
                <div class="col-md-4 dark-bg p-3">
                    <img class="image" src="resources/images/<?php echo $game['image'] ?>" alt="<?php echo $game['name'] ?>">
                </div>
                <div class="col-md-8 dark-bg p-3">
                    <?php echo $game['youtube']; ?>
                </div>
            </div>
            <div class="row justify-content-md-center w-100 m-0 my-1">
                <div class="d-flex p-0 flex-column dark-bg text-white text-center border border-secondary">
                    <h1>
                        <?php echo $game['name']; ?>
                    </h1>
                    <p>
                        <?php echo strip_tags($game['description']) ?>
                    </p>
                </div>
            </div>
            <div class="d-flex w-100 justify-content-around dark-bg text-white text-center skills border border-secondary my-1">
                <div class="border-right border-secondary align-middle p-1">
                    <h2 class="fs-5">Skills</h2>
                    <p class="m-0"><?php echo implode(", ", explode(";", $game['skills'])); ?></p>
                </div>
                <div class="border-right border-secondary align-middle p-1">
                    <h2 class="fs-5">Minimum spelers</h2>
                    <p class="m-0"><?php echo $game['min_players']; ?> spelers</p>
                </div>
                <div class="border-right border-secondary align-middle p-1">
                    <h2 class="fs-5">Maximum spelers</h2>
                    <p class="m-0"><?php echo $game['max_players']; ?> spelers</p>
                </div>
                <div class="border-right border-secondary align-middle p-1">
                    <h2 class="fs-5">Play minutes</h2>
                    <p class="m-0"><?php echo $game['play_minutes']; ?> minuten</p>
                </div>
                <div class="border-right border-secondary align-middle p-1">
                    <h2 class="fs-5">Uitleg tijd</h2>
                    <p class="m-0"><?php echo $game['explain_minutes']; ?> minuten</p>
                </div>
                <?php if (!empty($game['expansions'])) { ?>
                    <div class="border-right border-secondary align-middle p-1">
                        <h2 class="fs-5">Uitbereidingen</h2>
                        <p class="m-0"><?php echo implode(", ", explode(";", $game['expansions'])); ?></p>
                    </div>
                <?php } ?>
            </div>
            <div class="row w-100 m-0">
                <form class="d-flex flex-column w-100 mt-auto pb-3 dark-bg text-white border border-secondary" action="" method="POST">
                    <div class="row p-1">
                        <div class="col-md-3">
                            <label>Datum: </label>
                        </div>
                        <div class="col-md-9">
                            <input class="w-100" type="datetime-local" name="date">
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-md-3">
                            <label class="w-100">Uitlegger: </label>
                        </div>
                        <div class="col-md-9">
                            <input class="w-100" type="text" name="instructor">
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-md-3">
                            <label class="w-100">Spelers: </label>
                        </div>
                        <div class="col-md-9">
                            <input class="w-100" type="text" name="players">
                        </div>
                    </div>
                    <div class="p-1">
                        <input class="w-100 bg-primary text-light border-0" type="submit" value="Maak afspraak">
                    </div>
                </form>
            </div>
        </section>
    </div>
    <?php include "resources/content/footer.php"; ?>
</body>

</html>