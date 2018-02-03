//var imgSrc = "http://localhost/asquero/circuit-circuit-board-resistor-computer-163100.jpeg";
function iFrameOn()
{
	richTextField.document.designMode = 'On';
}

function iBold()
{
	richTextField.document.execCommand('bold',false,null);
}

function iUnderline()
{
	richTextField.document.execCommand('underline',false,null);
}

function iItalic()
{
	richTextField.document.execCommand('italic',false,null);
}

function iOrderedList()
{
	richTextField.document.execCommand('InsertOrderedList',false,'newOL');
}

function iUnorderedList()
{
	richTextField.document.execCommand('InsertUnorderedList',false,'newUL');
}

function iImage(imgSrc)
{
	//var imgSrc = prompt("Enter the image location",'');
	if(imgSrc != null)
	{
		/*imgSrc.height = 'auto';
		imgSrc.width = '40%';*/
		//alert(imgSrc);
		//imgSource = "<img src=\"".concat(imgSource).concat('\">');
		var imgSource = "<img alt='userUpload' id='user-upload' style='width:90%; height:auto; display:block; margin:0 auto;' src='".concat(imgSrc);
		imgSource = imgSource.concat("'>");
		if(richTextField.document.execCommand('insertHTML',false,imgSource))
			alert("Upload Success");
		else
			alert("Try Again");
	}
	else
	{
		alert("editor.js: no image selected");
	}
}

function iLink()
{
	var linkUrl = prompt("Enter the URL for this Link:","http://");
	richTextField.document.execCommand('CreateLink',false,linkUrl);
}

function submit_form()
{
	var theForm = document.getElementById("write-form");
	var content = window.frames['richTextField'].document.body.innerHTML;
	//content.replace("\"", "\\\"");
	//content.replace(/"/g, '\\"');
	var cTemp = "";
	/*content = "".concat(content);
	content = content.concat("");*/
	/*var r = "";
	for(var a = 0 ; a < content.length ; a++)
	{
		r = content.charAt(a);
		//if(r == '<')
			//cTemp = cTemp.concat("&lt;");
		//else if(r == '>')
			//cTemp = cTemp.concat("&gt;");
		if(r === '\"')
			cTemp = cTemp.concat("&quot;");
		else
			cTemp = cTemp.concat(r);
	}*/
	/*content.replace(/</g, " &lt; ");
	content.replace(/>/g, " &gt; ");
	content.replace(/"/g, "&quot;");*/

	/*content.replace('&'," &amp; ");
	content.replace('<'," &lt; ");
	content.replace('>'," &gt; ");*/

	//content = "<span>#</span>".content."<span>*</span>";
	//cTemp = "<pre>".cTemp."</pre>";
	/*cTemp = "<pre>".concat(cTemp);
	cTemp = cTemp.concat("</pre>");*/
	document.getElementById("user-text").value = content;
	//document.write(cTemp);
	//$.post("storeImage.php", {imgSrc:imgSrc}, function(user){ alert("success: "+user)});
	theForm.submit();
}
