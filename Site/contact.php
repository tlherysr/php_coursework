<!DOCTYPE html>
<html lang="en">
<title>Marauders - Matches</title>
<style>

body {
    background-image: URL(contact.jpg);
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; Resize the background image to cover the entire container
}
</style>
<?php include_once "head.php"; ?>

<body>

<?php include_once "nav.php"; ?>

<div class="container contact-con">
    <form action="action_page.php">
      <div class="container">
        <div class="form-group">
          <label for="fname">First Name</label>
          <input type="text" id="fname" class="form-control" placeholder="Your name..">
        </div>
          <label for="lname">Last Name</label>
          <input type="text" id="lname" class="form-control" placeholder="Your last name..">
          <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" id="country" name="country">
            <option value="Europe">Europe</option>
            <option value="UK">UK</option>
            <option value="usa">USA</option>       
        </select>
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <textarea id="subject" class="form-control" placeholder="Write something..." style="height:200px"></textarea>
        </div>
          <button class="button" type="submit" value="Submit"> submit </button>
        </div>
        <div class="col-sm-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39811.419517354814!2d-0.31821819856202144!3d51.41750058271817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876093778987453%3A0x4c3f21b23e3e35ec!2sKingston%20upon%20Thames!5e0!3m2!1sen!2suk!4v1580730927252!5m2!1sen!2suk" frameborder="0" allowfullscreen=""></iframe>
        </div>
        <div class="col-sm-4">
        <h3 id="contact-where">Where we are</h3>
        <p>Maruaders Rugby group</p>
        <p>Kingston</p>
        <p>contact Number: 1234567890</p>
      </div>
    </form>
</div> 

<?php include_once "footer.php"; ?>
</body>