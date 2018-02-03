$(document).ready(function(){
  $(document).on('change', '#inputimage', function(){
        var property = document.getElementById("inputimage").files[0];
        alert(property);
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        if(jQuery.inArray(image_extension, ['jpg','jpeg','png']) == -1)
        {
            alert("Improper Image File");
            return;
        }
        var image_size = property.size;
        if(image_size > 5000000)
        {
          alert("Image file size is very big");
        }
        else
        {
          var form_data = new FormData();
          form_data.append("filename",property);
          $.ajax({
            url: "upload.php",
            method: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function(){
              //$("#uploaded_image").html("<label id=\"test_success\">Image Uploading...</label>");
            },
            success:function(data){
              $("#uploaded_image").html(data);
            }
          })
        }
    });
  });
