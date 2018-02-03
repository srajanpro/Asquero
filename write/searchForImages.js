var content = "<?php echo $content; ?>";
var ch = "";
function sfi()
{
  var r = "";
  for(var a = 0 ; a < content.length-2 ; a++)
  {
    r = content.charAt(a);
    if(r == '<' && content.charAt(a+1) == 'i' && content.charAt(a+2) == 'm' && content.charAt(a+2) == 'g')
    {
      while(content.charAt(a) != '>')
      {
        content.charAt(a).replace(/</g, " &lt; ");
      	content.charAt(a).replace(/>/g, " &gt; ");
      	content.charAt(a).replace(/"/g, " &quot; ");
        if(content.charAt(a) == 's' && content.charAt(a+1) == 'r' && content.charAt(a+1) == 'c')
        {
          a = a + 5;
          while(content.charAt(a) != "\"" )
            {
              ch = ch.concat(content.charAt(a));
              a++;
            }
        }
        a++;
      }
      ch = ch.concat(content.charAt(a));
      alert(ch);
      document.getElementById("storeimages").innerText = ch;
    }
  }
  content.replace(/</g, " &lt; ");
  content.replace(/>/g, " &gt; ");
  content.replace(/"/g, " &quot; ");
}

function cloi()
{
  var initial_location = ch;
  var final_location = "<?php echo $fileDestination; ?>";
  content.replace(initial_location,final_location);
  document.getElementById("newContent").value = content;
}
