<!DOCTYPE html>
<html lang="en">
<title> <?=$PAGE_TITLE?> </title>
<?php include_once "../view/includes/head.php"; ?>
<body>

<?php include_once "../view/includes/nav.php"; ?>

<div class="container-fluid profile-main text-center">
    <div class="container profile">
        <h3 class="margin"> <?=$user->get_full_name()?> </h3>
        <img src="../view/images/blank.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="200" height="200">
      
        <?php if ($user->isAdmin): ?>
            <h3>Marauders Admin</h3>
        <?php else: ?>
            <h3>Marauder Supporter</h3>
        <?php endif; ?>

    <div class="col-sm-1"></div>
    <div class="col-sm-4 bor">
        <h1>Profile:</h1>
        <h4>Bio:</h4>
        <p>I like the Marauders, they are awesome.
    </div>
    <div class="col-sm-6 bor">
        <h1>Your booked tickets</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                <th>Match Date</th>
                <th>Opponent</th>
                <th>Location</th>
                <th>Match Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td> <?=$ticket->matchDate?> </td>
                        <td> <?=$ticket->opponent?>  </td>
                        <td> <?=$ticket->isHome?>    </td>
                        <td> <?=$ticket->matchType?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <div class="col-sm-1"></div>
    </div>
    </div>
</div>
</body>