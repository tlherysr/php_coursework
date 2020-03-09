<!DOCTYPE html>
<html lang="en">
<title>Marauders - Matches</title>
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
        <form class="form-horizontal" method="post" action="controller">
        <label for="search-date"><b>Search match by date:</b></label>
        <input id="rad" type="date" name="search-date" placeholder="Search for Match" id="rad" required>
        <input type="submit" value="search" id="rad" class="btn btn-primary"/>
        <label id="rad" for="search-opponent"><b>Search match by opponent:</b></label>
        <input type="text" name="search-opponent" placeholder="Search for Match" id="rad" required>
        <input type="submit" value="search" id="rad" class="btn btn-primary"/>
        <div class="col-sm-8">
        <label for="search-type"><b>Search match by match type:</b></label>
        <select class="form-control search-type" id="search-type rad">
            <option value="" disabled selected>Please choose a match type</option>
            <option value="home">Home</option>
            <option value="away">Away</option>
        </select>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-2 match-search">
        <button type="button" class="btn btn-success" value="search" id="match-search">Search</button>
        </div>
        </div>
        </form>
    </div>
    </div>
</div>
    <div class="container matches-table">
        <div class="tablee">
            <div class="col-md-12">
                <h1> Up-coming goes here</h1>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>Match Date</th>
                    <th>Opponent</th>
                    <th>Location</th>
                    <th>Match Type</th>
                    <th>Purchase</th>
                    <th>More Info<th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    <td>
                    <button type="button" class="btn-success" value="AddCart" id="submit">Add to cart! 
                    <span class="glyphicon glyphicon-shopping-cart" id="cart"></span></button>
                    </div>
                    </td>
                    <td>
                    <button type="button" class="btn-info" value="moreDetails" id="submit">Click for more details
                    </button>
                    </td>
                    </tr>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    <td>
                    <button type="button" class="btn-success" value="Add to Cart" id="submit">Add to cart! 
                    <span class="glyphicon glyphicon-shopping-cart" id="cart"></span></button>
                    </div>
                    </td>
                    <td>
                    <button type="button" class="btn-info" value="moreDetails" id="submit">Click for more details
                    </button>
                    </td>
                    </tr>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    <td>
                    <button type="button" class="btn-success" value="Add to Cart" id="submit">Add to cart! 
                    <span class="glyphicon glyphicon-shopping-cart" id="cart"></span></button>
                    </div>
                    </td>
                    <td>
                    <button type="button" class="btn-info" value="moreDetails" id="submit">Click for more details
                    </button>
                    </td>
                    </tr>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    <td>
                    <button type="button" class="btn-success" value="Add to Cart" id="submit">Add to cart! 
                    <span class="glyphicon glyphicon-shopping-cart" id="cart"></span></button>
                    </div>
                    </td>
                    <td>
                    <button type="button" class="btn-info" value="moreDetails" id="submit">Click for more details
                    </button>
                    </td>
                    </tr>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    <td>
                    <button type="button" class="btn-success" value="Add to Cart" id="submit">Add to cart! 
                    <span class="glyphicon glyphicon-shopping-cart" id="cart"></span></button>
                    </div>
                    </td>
                    <td>
                    <button type="button" class="btn-info" value="moreDetails" id="submit">Click for more details
                    </button>
                    </td>
                    </tr>
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    <td>
                    <button type="button" class="btn-success" value="Add to Cart" id="submit">Add to cart! 
                    <span class="glyphicon glyphicon-shopping-cart" id="cart"></span></button>
                    </div>
                    </td>
                    <td>
                    <button type="button" class="btn-info" value="moreDetails" id="submit">Click for more details
                    </button>
                    </td>
                    </tr>
                </tbody>
            </table>
            <h1>Add Match</h1>
            <form class="form-horizontal" method="post">
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
                        <td><input name="match_date" placeholder="Match Date"></td>
                        <td><input name="opponent" placeholder="Opponent"></td>
                        <td>
                            <select name="location" placeholder="Location">
                                <option value="1">League Game</option>
                                <option value="2">Cup Game</option>
                                <option value="3">Champ League Game</option>
                        </td>
                        <td><input name="price" placeholder="Price"></td>
                        <td>
                            <select name="match_type" placeholder="Match Type">
                                <option value="1">Home</option>
                                <option value="2">Away</option>
                        </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success" value="search" id="update" name="add_match">Update</button>
            </form>
        </div>
    </div>
    </div>
</div>
</div>

<?php include_once "../view/includes/footer.php"; ?>
</body>