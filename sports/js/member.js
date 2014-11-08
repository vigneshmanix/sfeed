
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
$("#first_"+ID).hide();
$("#last_"+ID).hide();
$("#first_input_"+ID).show();
$("#last_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();
var last=$("#last_input_"+ID).val();
var dataString = 'id='+ ID +'&name='+first+'&dept='+last;
//$("#first_"+ID).html('<img src="load.jpg" />'); // Loading image

if(first.length>0&& last.length>0)
{

$.ajax({
type: "POST",
url: "member_edit_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
$("#first_"+ID).html(first);
$("#last_"+ID).html(last);
}
});
}
else
{
alert('Enter something.');
}

});

// Edit input box click action
$(".editbox").mouseup(function()
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});

