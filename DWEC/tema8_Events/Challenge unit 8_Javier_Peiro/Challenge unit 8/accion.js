//Don't work on onload because all html need be loaded before
document.addEventListener("DOMContentLoaded", function(){

  //We declare the variables to work with it lather
  const inputProd=document.getElementById("producto");
  const inputCant=document.getElementById("cantidad");
  const inputPrecioUnidad= document.getElementById("precio-unitario");
  const añadirBoton= document.getElementById("añadir");
  const tbody=document.querySelector("tbody")
  const spanBaseImponible=document.getElementById("base-imponible");
  const spanMostrarIva=document.getElementById("iva");
  const spanMostrarTotal=document.getElementById("total");
  const IVA=0.21; //21% of iva is equal to multiply for that and sum it.

  //We start here the function to recalculate all when we put or quit a product
  const recalcularTotal=function(){
    let baseImponible=0;
    //I'm going to create a table to fill the products, I'm getting the product.
    tbody.querySelectorAll("tr").forEach((fila)=>{
      const precioTotal=parseFloat(fila.querySelector(".precio-total").textContent) || 0;
      baseImponible+=precioTotal;
    });
    //We calculate the Iva and the total cost
    const iva=baseImponible*IVA;
    const total=baseImponible+iva;
    //We show it,I put tofixed(2) to format it a bit
    spanBaseImponible.textContent=baseImponible.toFixed(2);
    spanMostrarIva.textContent=iva.toFixed(2);
    spanMostrarTotal.textContent=total.toFixed(2);
  };
  //We create the function to add the new products to the table
  const nuevaLinea=function(){
    //After an hour looking why parseInt.InnerHTML don't work i fount the .value... it works! xD
    const producto=inputProd.value;
    const cantidad=parseFloat(inputCant.value);
    const precioUnitario=parseFloat(inputPrecioUnidad.value);
    const precioTotal=cantidad*precioUnitario;

    //We create the element here, to work with it and appenChild it after, important the ` ` and ${}to get values inside the strings
    const fila=document.createElement("tr");
    fila.innerHTML=`
      <td>${producto}</td>
      <td>${cantidad}</td>
      <td>${precioUnitario}</td>
      <td class="precio-total">${precioTotal}€</td>
      <td>
        <button class="detalle">Detalle</button>
        <button class="eliminar">Eliminar</button>
      </td>
    `;
    //The alert
    fila.querySelector(".detalle").addEventListener("click", function(){
      alert(`Producto: ${producto}
            Cantidad: ${cantidad}
            Precio unitario: ${precioUnitario}€
            Precio total: ${precioTotal}€`);
    });
    fila.querySelector(".eliminar").addEventListener("click", () => {
      tbody.removeChild(fila);
      //When we eliminate the row, we need re-calculate all, then we call the function
      recalcularTotal();
    });

    //Finally we add the row, but also clean the inputs and also recalculate all again
    tbody.appendChild(fila);

    //We put the value camps in void
    inputProd.value="";
    inputCant.value="";
    inputPrecioUnidad.value="";
    //Finally re-calculate all again
    recalcularTotal();
  };//Final of nuevaLinea

  //we put a listener to the button to call the function
  añadirBoton.addEventListener("click", nuevaLinea);
});//Final of onload