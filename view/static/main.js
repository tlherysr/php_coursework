$(document).ready(initialisePage);


function initialisePage() {
  $("div.messages").hide();
  $("div#searchByOpponent input").keyup(handleNiceAutoCompleteSearch);
  $("input#newopponent").keyup(handleNiceAutoCompleteAddTeam);
  $("div#addTeam input[name=stadiumName]").keyup(autoCompleteStadiums);
}

function handleNiceAutoCompleteAddTeam() {
  var search = $("input#newopponent").val().trim();
  if (search != "") {
    $.get("api/getTeams_service.php?teamname="+search,niceAutoCompleteCallbackAddTeam);
  }
  else // if search IS empty
  {
    $("form#addmatchform div.results").hide();
  }
}

function niceAutoCompleteCallbackAddTeam(results) {

  $("form#addmatchform div.results").empty();
  
    for (var i = 0; i < results.length; i++)
    {
      
      var result = $('<div class="result">'+results[i].teamName+'</div>');
      var id = $('<input type="hidden" value="' + results[i].id + '"></input>');
      result.click(function(){
        $("form#addmatchform div.results").hide();
        $("form#addmatchform input[name=opponent]").val($(this).text());
        $("form#addmatchform input[name=teamID]").val($(this).next().val());
      });
      $("form#addmatchform div.results").append(result);
      $("form#addmatchform div.results").append(id);
    }
    if (results.length == 0)
    {
      $("form#addmatchform div.results").hide();
      $("form#addmatchform input[name=teamID]").val('');
    }
    else {
      $("form#addmatchform input[name=teamID]").val('');
      $("form#addmatchform div.results").show();
    }
}

function handleNiceAutoCompleteSearch() {
  var search = $("div#searchByOpponent input").val().trim();
  if (search != "") {
    $.get("api/getTeams_service.php?teamname="+search,niceAutoCompleteCallbackSearch);
  }
  else // if search IS empty
  {
    $("div#searchByOpponent div.results").hide();
  }
}

function niceAutoCompleteCallbackSearch(results) {

    $("div#searchByOpponent div.results").empty();

    for (var i = 0; i < results.length; i++)
    {
      var result = $('<div class="result">'+results[i].teamName+'</div>');
      result.click(function(){
        $("div#searchByOpponent div.results").hide();
        $("#searchform input[name=search-opponent]").val($(this).text());
        $("#searchform input[name=search_by_opponent]").val("search");
        
        $('#searchform').submit();
      });
      $("div#searchByOpponent div.results").append(result);
    }
    if (results.length == 0)
    {
      $("div#searchByOpponent div.results").hide();
    }
    else {
      $("div#searchByOpponent div.results").show();
    }
}

function autoCompleteStadiums() {
  var search = $("div#addTeam input[name=stadiumName]").val().trim();
  if (search != "") {
    $.get("api/getStadiums_service.php?stadiumname="+search,niceAutoCompleteCallbackStadiums);
  }
  else // if search IS empty
  {
    $("div#addTeam div.results").hide();
  }
}

function niceAutoCompleteCallbackStadiums(results) {
  $("div#addTeam div.results").empty();
  
  for (var i = 0; i < results.length; i++)
  {
    var result = $('<div class="result">'+results[i].stadiumName+'</div>');
    var id = $('<input type="hidden" value="' + results[i].id + '"></input>');
    result.click(function() {
      $("div#addTeam div.results").hide();
      $("#addteamform input[name=stadiumName]").val($(this).text());
      $("#addteamform input[name=stadiumID]").val($(this).next().val());
    });
    $("div#addTeam div.results").append(result);
    $("div#addTeam div.results").append(id);
  }
  if (results.length == 0)
  {
    $("#addteamform input[name=stadiumID]").val('');
    $("div#addTeam div.results").hide();
  }
  else {
    $("#addteamform input[name=stadiumID]").val('');
    $("div#addTeam div.results").show();
  }
}

$(document).on('submit', 'form.matchForms', function( event ){
  event.preventDefault();
  
  var inputs = $(this).serializeArray();
  var location = inputs[0].value;
  var seatingPosition = inputs[1].value;
  var error_message = $('div#matchestable div#error_message');
  var success_message = $('div#matchestable div#success_message');

  if ( !["1","2","3","4"].includes(seatingPosition) ) {
    error_message.fadeIn().html('You have to choose seating position.')
  } else {
    if (location == 0) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Bus Tickets',
        text: "Selected match is an away match. Would you like to book a bus ticket too ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, please!',
        cancelButtonText: 'No, thanks!',
        reverseButtons: true
  
      }).then((result) => {
        if (result.value) {
          $(this).parent().find("input[name=busTicket]").val('true');
          error_message.html('').fadeOut();
          $.ajax({
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
              success_message.fadeIn().html('Your ticket is added to your basket!');
              setTimeout(function() {
                success_message.fadeOut("slow");
              }, 2000 );
            }
          });
          swalWithBootstrapButtons.fire(
            'Booked!',
            'Your bus ticket is booked along with the ticket itself ',
            'success'
          )  
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Bus ticket is cancelled. But the ticket added to your basket.',
            'success'
          )
          error_message.html('').fadeOut();
          $.ajax({
            type: "POST",
            data: $(this).serialize(),
            success: function(data){
              success_message.fadeIn().html('Your ticket is added to your basket!');
              setTimeout(function() {
                success_message.fadeOut("slow");
              }, 2000 );
            }
          });
        }
      })
    } else {
      error_message.html('').fadeOut();
      $.ajax({
        type: "POST",
        data: $(this).serialize(),
        success: function(data){
          success_message.fadeIn().html('Your ticket is added to your basket!');
          setTimeout(function() {
            success_message.fadeOut("slow");
          }, 2000 );
        }
    });
    }
  }

});

$(document).on('submit', 'form#addteamform', function( event ){
  event.preventDefault();

  $(this).validate({
    rules: {
        teamName: {
            required: true
        },
        stadiumName: {
            required: true
        }
    }
  });

  if ( !$(this).valid() ) {
    return;
  }

  var error_message = $(this).parent().find("div#error_message");
  var success_message = $(this).parent().find("div#success_message");

  $("<input>").attr({ 
    name: "addTeam", 
    type: "hidden", 
    value: "addTeam"
  }).appendTo($(this));

  var inputs = $(this).serializeArray();
  var stadiumID = inputs[2].value;
  
  if ( stadiumID ) {
    error_message.html('').fadeOut();
    $.ajax({
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        success_message.fadeIn().html('Team has been added to database.');
        setTimeout(function() {
          success_message.fadeOut("slow");
        }, 2000 );
      }
    });
  } else {
    error_message.fadeIn().html('Please choose the stadium from the options.')
    $(this).find('input[name=addTeam]').remove();
  }

});

$(document).on('submit', 'form#addmatchform', function( event ){
  event.preventDefault();
  
  $(this).validate({
    rules: {
        match_date: {
            required: true,
            date: true,
        },
        opponent: {
            required: true
        },
        price: {
          required: true
        },
    }
  });

  if ( !$(this).valid() ) {
    return;
  }

  var error_message = $(this).parent().find("div#error_message");
  var success_message = $(this).parent().find("div#success_message");
 
  $("<input>").attr({ 
    name: "addMatch", 
    type: "hidden", 
    value: "addMatch"
  }).appendTo($(this));

  var inputs = $(this).serializeArray();
  var teamID = inputs[2].value;

  if ( teamID ) {
    error_message.html('').fadeOut();
    $.ajax({
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        success_message.fadeIn().html('The match has been added to database.');
        setTimeout(function() {
          success_message.fadeOut("slow");
        }, 2000 );
      }
    });
  } else {
    error_message.fadeIn().html('Please choose the opponent from the dropdown list.')
  }

});

$(document).on('submit', 'form#addstadiumform', function( event ){
  event.preventDefault();
  
  $(this).validate({
    rules: {
        stadiumName: {
            required: true,
        },
        stadiumAddress: {
            required: true
        },
        noOfSeats: {
          required: true,
          number: true
        },
    }
  });

  if ( !$(this).valid() ) {
    return;
  }

  $("<input>").attr({ 
    name: "addStadium", 
    type: "hidden", 
    value: "addStadium"
  }).appendTo($(this));

  var success_message = $(this).parent().find("div#success_message");
  $.ajax({
    type: "POST",
    data: $(this).serialize(),
    success: function(data){
      success_message.fadeIn().html('The stadium has been added to database.');
      setTimeout(function() {
        success_message.fadeOut("slow");
      }, 2000 );
    }
  });

});
