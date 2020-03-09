<!DOCTYPE html>
<html lang="en">
<title> <?=$PAGE_TITLE?> </title>
<?php include_once "../view/includes/head.php"; ?>
<body>
  
<?php include_once "../view/includes/nav.php"; ?>

<div class="container-fluid">
  <div class="row">
    <img src="../view/images/team.png" class="img-responsive" alt="Responsive image">
  </div>
</div> 
<div class="container">
</div>
<div class="container promo-col">
  <div class="row tickets">
    <div class="col-md-6 promo">
    <h3>Recently Added games</h3>
      <table class="table">
                  <thead>
                    <tr>
                    <th>Match Date</th>
                    <th>Opponent</th>
                    <th>Location</th>
                    <th>Match Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    </tr>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    </tr>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    </tr>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    </tr>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    </tr>
            </tbody>
          </table>
    </div>
    <div class="col-md-6 promo">
      <h3>Current Promotions</h3>
      <ul class="list-group">
        <li class="list-group-item">Half price for children under 10 </br> <strong>rugbykids</strong></li>
        <li class="list-group-item">10% off Home games </br> <strong>home10</strong></li>
        <li class="list-group-item">40% off tomatos to throw </br> <strong>40tomatos</strong></li>
      </ul>
    </div>
</div>
    <div>
        <a href="matches.php" class="list-group-item list-group-item-success"> <h3>View All Matches</h3> </a>
        <a href="matches.php" class="list-group-item list-group-item-info"> <h3>Purchase Single Tickets</h3></a>
</div>
      </div>
<!-- <div class="container promo-col">
  <h2 class="text-center"> Buy! </h2>
  <div class="row tickets">
    <div class="col-md-6 promo">
      <h1 class="over-img">Season Tickets</h1>    
        <img src="stadium.png">
    </div>
    <div class="col-md-6 promo">
      <h1 class="over-img">Single Tickets</h1>
        <img src="ball.png"> -->
    </div>
  </div>
</div>

<?php include_once "../view/includes/footer.php"; ?>
</body>