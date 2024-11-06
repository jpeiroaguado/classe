/*function randomText(){
    var text=("!@#$%^*()");
    letters=text[Math.floor(Math.random()*text.length)];
    return letters;
}
function rain(){
    let cloud=document.querySelector('.cloud');
    let e=document.createElement('div');
    e.classList.add('drop');
    cloud.appendChild(e);

    let left=Math.floor(Math.random()*300);
    let size=Math.random()*1.5;
    let duration=Math.random()*1;

    e.innerText=randomText();
    e.style.left=left+'px';
    e.style.fontSize= 0.5+size+'em';
    e.style.animationDuration=1+duration+'s';

    setTimeout(function(){
        cloud.removeChild(e)
    }, 2000)
}

setInterval(function(){
    rain()
},20);*/
function randomText() {
    const characters = '01'; // Puedes agregar más caracteres aquí
    let text = '';
    const textLength = Math.floor(Math.random() * 30) + 15; // Aumenta la longitud

  
    for (let i = 0; i < textLength; i++) {
        text += characters[Math.floor(Math.random() * characters.length)];
          text += '\n'; // Agrega un salto de línea cada caracteres

      }
    
    return text;
  }
  
  function createDrop() {
    const cloud = document.querySelector('.cloud');
    const drop = document.createElement('div');
    drop.classList.add('drop');
    drop.textContent = randomText();
    drop.style.left = Math.random() * window.innerWidth + 'px';
    drop.style.animationDuration = Math.random() * 8 + 3 + 's';
    cloud.appendChild(drop);
  }
  
  setInterval(createDrop, 20); // Ajusta el intervalo para controlar la densidad de la lluvia

  