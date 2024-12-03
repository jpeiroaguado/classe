
  var promesa1=new Promise((resolver, rechazar)=>{
    let n1=2;
    let n2=2;
    if(n1==n2) resolver("¡Son iguales!");
    else rechazar(Error("Algo raro ha pasado"));
  });//Prueba//

  promesa1.then((respuesta)=>{console.log(respuesta)});

  