document.getElementById('woring').style.display = 'none';
function keyintdot() {
var key = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
if ((key<46 || key>57 || key == 47) && (key != 13)) {
    event.returnValue = false;
    document.getElementById('woring').style.display = 'block';
    document.getElementById('woring').style.color = 'red';
    
    
    
}else{
    document.getElementById('woring').style.display = 'none';
    
}


}