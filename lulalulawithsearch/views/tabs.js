// Logs:
// -Remove window.onload function 'para dili sige balik sa id na gi set everyload'
// -Added auto click on default sa end sa options finction
// -Added getQueryStringVariable para capture ang URL. Added condition.
//Changed redirect location after update button click.

function options(evt, opName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(opName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById('defaultOpen').click();

//Caputre sa URL
function getQueryStringVariable(variable)
{
   var queryString = window.location.search.substring(1);
   var vars = queryString.split("&");
   for (var i=0;i<vars.length;i++) {
       var pair = vars[i].split("=");
       if(pair[0] == variable){
            return pair[1];
        }
   }
   return false;
}
//condition para mag show either si students or Userlist after Update
var view = getQueryStringVariable("view");
if (view === "yes")
{   
    document.getElementById("Userslist").style.display = "block";
    evt.currentTarget.className += " active";   
}
else
{
    document.getElementById("Students").style.display = "block";
    evt.currentTarget.className += " active";
}
