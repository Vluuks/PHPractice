window.onload = function() {
    
    // ask for php data
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log("request ok" + xmlhttp.responseText);
        }
  }
    xmlhttp.open("GET","test.php",true);
    xmlhttp.send();
}