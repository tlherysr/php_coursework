<!DOCTYPE html>
<html lang="en">
<title> <?=$PAGE_TITLE?> </title>
<style>

    body {
        background-image: URL(../view/images/ball.jpg);
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover; /* Resize the background image to cover the entire container */
    }

</style>
<?php include_once "../view/includes/head.php"; ?>

<body>

    <?php include_once "../view/includes/nav.php"; ?>

    <div class="container matches-box">
        <div class="container">
        <h1> Match Searcher </h1>
        <div class="row">
            <form id="searchform" class="form-horizontal" method="post">
                <label for="search-date"><b>Search match by date:</b></label>
                <input type="date" name="search-date" placeholder="Search for Match">
                <input type="submit" value="search" name="search_by_date" class="btn btn-primary"/>

                <div id="searchByOpponent">
                    
                    <label for="search-opponent"><b>Search match by opponent:</b></label>
                    <input type="text" name="search-opponent" placeholder="Search for Opponent">
                    
                    <div class="results"></div>

                </div>

                <input type="submit" value="search" name="search_by_opponent" class="btn btn-primary"/>

                <div class="col-sm-8">
                    <label for="search-type"><b>Search match by match type:</b></label>
                    <select class="form-control" id="search-type" name="match_type">
                        <option value="" disabled selected>Please choose a match type</option>
                        <option value="1">Home</option>
                        <option value="0">Away</option>
                    </select>
                    
                    <label for="search-position"><b>Search match by stadium position:</b></label>
                    <select class="form-control" id="search-position" name="position">
                        <option value="" disabled selected>Please choose a position</option>
                        <option value="1">Section 1</option>
                        <option value="2">Section 2</option>
                        <option value="3">Section 3</option>
                        <option value="4">Section 4</option>
                        <option value="5">Section 5</option>
                        <option value="6">Section 6</option>
                    </select>
                </div>

                <div class="col-sm-1"></div>
                <div class="col-sm-2 match-search">
                    <button type="submit" class="btn btn-success" value="search" id="match-search" name="search_type_position">Search</button>
                </div>
                
                </div>
            </form>
        </div>
        </div>
    </div>
        <div class="container matches-table">
            <div class="tablee">
                <div class="col-md-12" id="matchestable">
                    <h1> Up-coming goes here</h1>
                    <hr>
                    
                    <div id="error_message" class="alert alert-danger messages" role="alert"></div>
                    <div id="success_message" class="alert alert-success messages" role="alert"></div>
                    
                    <table class="table table-striped">                    
                        <thead>
                            <tr>
                            <th>Match Date</th>
                            <th>Opponent</th>
                            <th>Location</th>
                            <th>Match Type</th>
                            <th>Seating Position</th>
                            <th>Purchase</th>
                            <th>More Info<th>
                            </tr>
                        </thead>
                    <tbody>                    
                    
                        <?php foreach ($matches as $match): ?>
 
                            <form method="POST" class="matchForms">
                                <tr>
                                    <td><?=$match->matchDate?></td>
                                    <td><?=$match->teamName?></td>
                                    
                                    <?php if ($match->isHome): ?>
                                        <td>Home</td>                                        
                                    <?php else: ?>
                                        <td>Away</td>
                                    <?php endif; ?>
                                    <input type="hidden" name="location" value="<?=$match->isHome?>"></input>

                                    <td> <?=$match->matchType?> </td>
                                    <td>
                                        <select class="seating_position form-control" name="seatingPosition" placeholder="Seating Position">
                                            <option selected>Open this select menu</option>
                                            <option value="1">East</option>
                                            <option value="2">West</option>
                                            <option value="3">North</option>
                                            <option value="4">South</option>
                                    </td>
                                    <td>
                                        <input type="hidden" name="matchID" value="<?=$match->id?>"></input>
                                        <input type="hidden" name="add_cart">
                                            <button type="submit" class="btn btn-success" name="add_cart"> 
                                                Add to cart! &nbsp&nbsp
                                                <span class="glyphicon glyphicon-shopping-cart" id="cart"></span>
                                            </button>
                                        </input>
                                    </td>
                                    <input type="hidden" name="busTicket" value="false"></input>
                                    
                                    <td>
                                        <button type="button" class="btn btn-info"> Click for more details </button>
                                    </td>
                                </tr>
                            </form>
                            
                        <?php endforeach; ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    </div>

    <?php if ( isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1 ): ?>
    
    <div class="container matches-table">
        <div class="tablee">
            <div class="col-md-12">
                
                <h1>Add Match</h1>
                <form id="addmatchform" class="form-horizontal" method="post">
                
                    <div id="error_message" class="alert alert-danger messages" role="alert"></div>
                    <div id="success_message" class="alert alert-success messages" role="alert"></div>
            
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Match Date</th>
                            <th>Opponent</th>
                            <th>Match Type</th>
                            <th>Price</th>
                            <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><input class="form-control" name="match_date" placeholder="Match Date"></td>
                            <td><input id="newopponent" class="form-control" name="opponent" placeholder="Opponent"></td>
                            <input type="hidden" name="teamID" id="teamID"></input>
                            <td>
                                <select class="form-control" name="match_type" placeholder="Location">
                                    <option selected>Open this select menu</option>
                                    <option value="1">League Game</option>
                                    <option value="2">Cup Game</option>
                                    <option value="3">Champ League Game</option>
                            </td>
                            <td><input class="form-control" name="price" placeholder="Price"></td>
                            <td>
                                <select class="form-control" name="location" placeholder="Match Type">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Home</option>
                                    <option value="0">Away</option>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="results"></div>
                    <button type="submit" class="btn btn-success" value="search" id="update" name="add_match">Add Match</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container matches-table">
        <div class="tablee">
            <div class="col-md-12" id="addTeam">
                
                <h1>Add Team</h1>
                <form id="addteamform" class="form-horizontal" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Team Name</th>
                                <th>Stadium Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div id="error_message" class="alert alert-danger messages" role="alert"></div>
                            <div id="success_message" class="alert alert-success messages" role="alert"></div>
                    
                            <tr>
                                <td><input class="form-control" name="teamName" placeholder="Team Name"></td>
                                <td><input class="form-control" name="stadiumName" placeholder="Stadium Name"></td>
                                <input type="hidden" name="stadiumID" id="stadiumID"></input>
                            </tr>
                        </tbody>
                    </table>
                
                    <div class="results"></div>
                    <button type="submit" class="btn btn-success" id="update">Add Team</button>
                </form>
            
            </div>
        </div>
    </div>


    <div class="container matches-table">
        <div class="tablee">
            <div class="col-md-12">
                
                <h1>Add Stadium</h1>
                <form class="form-horizontal" method="post" id="addstadiumform">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Stadium Name</th>
                                <th>Stadium Address</th>
                                <th>Number of Seats</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <div id="success_message" class="alert alert-success messages" role="alert"></div>
                        
                            <tr>
                                <td><input class="form-control" name="stadiumName" placeholder="Stadium Name"></td>
                                <td><input class="form-control" name="stadiumAddress" placeholder="Stadium Address"></td>
                                <td><input class="form-control" name="noOfSeats" placeholder="Number of Seats"></td>
                            </tr>
                        
                        </tbody>
                    
                    </table>
                    <button type="submit" class="btn btn-success" value="search" id="update" name="addStadium">Add Stadium</button>
                </form>
            
            </div>
        </div>
    </div>
    <?php endif; ?>


    <?php include_once "../view/includes/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="../view/static/main.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

</body>
</html>
