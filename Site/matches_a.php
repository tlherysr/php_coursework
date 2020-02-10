<!DOCTYPE html>
<html lang="en">
<title>Marauders - Matches</title>
<?php include_once "head.php"; ?>

<body>

<?php include_once "nav.php"; ?>

<div class="container matches-box">
    <h1> Match Searcher </h1>
    <div class="row">
        <form class="form-horizontal" method="post" action="controller">
        <label for="search-date"><b>Search match by date:</b></label>
        <input type="text" name="search-date" placeholder="Search for Match" required>
        <input type="submit" value="search"/>
        <label for="search-opponent"><b>Search match by opponent:</b></label>
        <input type="text" name="search-opponent" placeholder="Search for Match" required>
        <input type="submit" value="search"/>
        <label for="search-type"><b>Search match by match type:</b></label>
        <select class="form-control" id="search-type">
            <option value="" disabled selected>Please choose a match type</option>
            <option value="home">Home</option>
            <option value="away">Away</option>
        </select>
            <label for="search-position"><b>Search match by stadium position:</b></label>
        <select class="form-control" id="search-position">
            <option value="" disabled selected>Please choose a position</option>
            <option value="1">Section 1</option>
            <option value="2">Section 2</option>
            <option value="3">Section 3</option>
            <option value="4">Section 4</option>
            <option value="5">Section 5</option>
            <option value="6">Section 6</option>
        </select>
        </form>
    </div>
</div>
    <div class="container-fluid table">
        <div class="tablee">
            <div class="col-md-12">
                <h1 class="text-center"> Up-coming goes here</h1>
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
                    <tr>
                    <td>01/02/2020</td>
                    <td>some team</td>
                    <td>home</td>
                    <td>premier</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>



<?php include_once "footer.php"; ?>
</body>