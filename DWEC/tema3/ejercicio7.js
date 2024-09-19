let cantidad=prompt("Introduce how many lines of asterisk do you want:")

if(isNaN(cantidad)==false && cantidad>0){
    for(let i=0;i<cantidad;i++){
        document.write("*")
    }
    document.write("*<br>")
}