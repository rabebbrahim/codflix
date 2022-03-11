
$(document).ready(function() {
  $( '#sidebarCollapse' ).on( 'click', function() {

    $( '#sidebar' ).toggleClass('open');
  });
  $('#password, #password_confirm').on('keyup', function () {
    var password = $("#password").val();
    var confirm_password = $("#password_confirm").val();
	if(password !== confirm_password) {
           $("#password_confirm").css('border-color', "red");
	}
        else{
           $("#password_confirm").css('border-color', "green");
        }
  });

  $(".fav").click(function(){
    var id = this.id; 
     $(".fav_"+id).css("color","red");
        $("#id").val(id);
        document.getElementById("myForm").submit();
    // $.ajax({
    //     url: 'http://localhost/codFix/controller/favorisController.php/addfavoris',
    //     type: 'post',
    //     data: {id:id},
    //     dataType: 'json',
    //     success: function(){  
          
    //         $(".fav_"+id).css("color","red");
    //     }
    // });

  });
  $(".like, .unlike").click(function(){
    var id = this.id;   // Getting Button id
var media =$(this).attr("name");
var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1];
    // Finding click type
    var type = 0;
    if(text == "like"){
        type = 1;
    }else{
        type = 0;
    }
console.log("type",type);
console.log("name",media);
    $.ajax({
          url: 'http://localhost/codFix/controller/likeunlikeControleur.php',
          type: 'post',
          data: {type:type,media:media},
          // dataType: 'json',
          success: function(){  
            if(type == 1){
              $("#like_"+postid).css("color","red");
              $("#unlike_"+postid).css("color","gray");
          }
          if(type == 0){
              $("#unlike_"+postid).css("color","red");
              $("#like_"+postid).css("color","gray");
          }
  
          }
      });
  
});
});

    // AJAX Request
//     $.ajax({
//         url: 'likeunlike.php',
//         type: 'post',
//         data: {postid:postid,type:type},
//         dataType: 'json',
//         success: function(data){
//             var likes = data['likes'];
//             var unlikes = data['unlikes'];

//             $("#likes_"+postid).text(likes);        // setting likes
//             $("#unlikes_"+postid).text(unlikes);    // setting unlikes

//             if(type == 1){
//                 $("#like_"+postid).css("color","#ffa449");
//                 $("#unlike_"+postid).css("color","lightseagreen");
//             }

//             if(type == 0){
//                 $("#unlike_"+postid).css("color","#ffa449");
//                 $("#like_"+postid).css("color","lightseagreen");
//             }

//         }
//     });

// });

// });

