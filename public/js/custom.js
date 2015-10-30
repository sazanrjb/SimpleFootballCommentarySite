/**
 * Created by sazanrjb on 10/17/15.
 */

$(document).ready(function(){

// Search Button Animation --------------------------
    $('#searchArea').hide();

    $('#searchButton').click(function(){
        $(this).hide();
        $('#searchArea').fadeIn('fast');
        $('#search').focus();
    });

// Navigation ---------------------------------------
    $('#newMatch').hide();
    $('#pausedMatches').hide();
    $('#runningMatches').hide();
    $('#closedMatches').hide();


    $('aside a').click(function(){
        $('#index').hide();
        $('#newMatch').hide();
        $('#pausedMatches').hide();
        $('#runningMatches').hide();
        $('#closedMatches').hide();
       var index = $(this).parent().index();
       $('.workArea').eq((index+1)).show()
    });

    $(".datepicker" ).datepicker();

    $('#home').click(function(){
       window.location.assign('/');
    });

    //
    //$('#getc').hover(function() {
    //
    //    $.ajax({
    //        url: "/getCommentary",
    //        method: "get",
    //        data: ({id: '{{$match->id}}'}),
    //        success: function (results) {
    //            $('#cArea').html(results);
    //        }
    //    })
    //})


});