function getdata() {
    var http = new XMLHttpRequest();
    var url = 'xhttp/getcustfiltdata.php';

    var maxprijs = document.getElementById('maxprijs').value;
    var minmem = document.getElementById('minmem').value;
    obj = { "maxprijs":maxprijs, "minmem":minmem };
    dbParam = JSON.stringify(obj);

    http.open('POST',url , true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.
       if(http.readyState == 4 && http.status == 200) {
          document.getElementById("resultset").innerHTML = this.responseText;
       }
    }

    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");   
    http.send("x=" + dbParam);
 }