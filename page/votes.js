$(document).ready(function(){
  var ue = 0;
  var de = 0;
  var count = 1;
  var id = $("#id-vote").text();
  var mid = $("#mid-vote").text();
  var user = $("#user-vote").text();
  var r = 0;

  //if($("#user-signedin").text() == "true")
  //{
  $("#vote-up").click(function(){
    r++;
    if(count == 1)
    {
      var up = $("#upvotes").text();
      var up_int = Number(up) + 1;
      $("#upvotes").text(up_int);
      count = -1;
      $.post("votes.php", {id:id,mid:mid,user:user,r:r}, function(error){ alert("success: "+error)});
    }
    //alert("upvote");
  });

  $("#vote-down").click(function(){
    r--;
    if(count == 1)
    {
      var down = $("#downvotes").text();
      var down_int = Number(down) + 1;
      $("#downvotes").text(down_int);
      count = -1;
      $.post("votes.php", {id:id,mid:mid,user:user,r:r}, function(error){ alert("success: "+error)});
    }
    //alert("downvote");
  });

  /*if(r == 1 || r == -1)
  {
        alert("Staring");
        //$.post("votes.php", {id:id,user:user,r:r}, function(user){ alert("success: "+user)});
  }*/
//}
});
