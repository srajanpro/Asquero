$(document).ready(function(){
  $("#submitCommentid").click(function(){
    var comment = $("#commentId").text();
    var user = $("#containUser").text();
    var id = $("#containID").text();
    $.post("../write/insertCommentReply.php",
    {
        input: "comment",
        data: comment,
        user: user,
        id: id
    },
    function(error){
        alert("Error inserting comment: " + error);

    });
});
});
