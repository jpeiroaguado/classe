class Criatura{
    constructor(nombre, vida=1){
        this.nombre=nombre;
        this.vida=vida;
    }
    mostrarVida(){
        return this.vida;
    }
    quitarVida(daño){
        this.vida-=daño;
        if(this.vida<=0)
            return -1;
        else return this.vida;
    }
    //el 3er atributo es el Daño del arma
    asignarArma(){
        let arm=Math.floor(Math.random(1, 3)*3+1);
        this.arma=new Array();;
        if (arm==1){
            this.arma=["Garrote",1,3];
        }else if(this.arma==2){
            this.arma=["Pedrusco",2, 2];

        }else{
            this.arma=["Puño",3,1];
        }
    }

    lanzarDados(){
        if (this.arma[1]==1){
            var ataques=new Array();
            for(let d=0;d<=2;num++){
            ataques.push(Math.floor(Math.random(1, 6)*6+1));
            }
            return ataques;
        }else if(this.arma[1]==2){
            let ataques=new Array();
            for(let d=0;d<=3;num++){
            ataques.push(Math.floor(Math.random(1, 6)*6+1));
            }
            return ataques;
        }else if(this.arma[1]==3)
            var ataques=new Array();
            for(let d=0;d<=5;num++){
            ataques.push(Math.floor(Math.random(1, 6)*6+1));
            }
            return ataques;
    }
}

class Heroe extends Criatura{
    constructor(nombre, vidaMaxima){
        super(nombre, vida)
        
        this.vida=Math.floor(Math.random(1, vidaMaxima)*vidaMaxima+1);
        
    }
    asignarArma(){
        let arm=Math.floor(Math.random(1, 3)*3+1);
        this.arma=new Array();
        //Recordando que el 3er atributo es el Daño del arma
        if (arm==1){
            this.arma=["Maza",1,4];
        }else if(this.arma==2){
            this.arma=["Espada",2,3];
        }else{
            this.arma=["Lanza",3,2];
        }
    }/*
    MAPAS
    this.armas=new Map([3, "espada"], [2, "arco"], [1, "pedra"]);
    this.arma=armas.get(Math.floor(Math.random()*this.armas.site)+1)
    FOREACH
    this.armas.forEach((k, valor)->{
        if(this.arma=valor) numdados=k);
    } 
    */ 
    lanzarDados(){
        if (this.arma[1]==1){
            var ataques=new Array();
            for(let d=0;d<=3;num++){
            ataques.push(Math.floor(Math.random(1, 6)*6+1));
            }
            return ataques;
        }else if(this.arma[1]==2){
            var ataques=new Array();
            for(let d=0;d<=4;num++){
            ataques.push(Math.floor(Math.random(1, 6)*6+1));
            }
            return ataques;
        }else if(this.arma[1]==3)
            var ataques=new Array();
            for(let d=0;d<=5;num++){
            ataques.push(Math.floor(Math.random(1, 6)*6+1));
            }
            return ataques;
    }
}
class Juego{
    constructor(){
        this.criaturas=new Array();
        this.historico=new Array();
    }
    
    crearCriatura(tipo, nombre, vidaMax){
        if(tipo=="Heroe"){
            let heroe=new Heroe(nombre, vidaMax);
            heroe.asignarArma();
            this.criaturas.push(heroe);
        }else if(tipo=="Criatura"){
            let criatura=new Criatura(nombre, vidaMax);
            criatura.asignarArma();
            this.criaturas.push(criatura);
        }
    }
    luchar(atacante, defensor){
        //Ataques del Atacante y del defensor, se que querias que hicieramos el .sort() pero lo entendí tarde.
        ataquesAtacante=new Array();
        ataquesAtacante=atacante.lanzarDados();
        ataquesDefensor=new Array();
        ataquesDefensor=defensor.lanzarDados();
       
        mayorAtAtacante=0;
        mayorAtDefensor=0;
        for(let c=0; c<ataquesAtacante.length;c++){
            if(ataquesAtacante[c]>mayorAtAtacante)
                mayorAtAtacante=ataquesAtacante[c];
        }

        for(let c=0; c<ataquesDefensor.length;c++){
            if(ataquesDefensor[c]>mayorAtDefensor)
                mayorAtDefensor=ataquesDefensor[c];
        }
        //Según quien haya ganado hacemos un ataque u otro y lo registramos en el log
        if(mayorAtAtacante>=mayorAtDefensor){
            vidaRestante=defensor.quitarVida(atacante.arma[2]);
            if(vidaRestante<0){
                fecha=new Date();
                fecha=fecha.getHour()+fecha.getMinutes()+fecha.getSeconds();
                //Si los arrays de arrays no funcionan así, lo siento, no me ha dado tiempo a indagar mas como van los arrays de arrays, sorry :()
                this.historico.push(fecha+atacante.nombre+"ha derrotado con el arma "+atacante.arma[0]+"haciendo "+atacante.arma[2]+"puntos de daño a"+ defensor.nombre+", que era de tipo "+defensor.tipo);
            }else{
                vidaRestante=atacante.quitarVida(defensor.arma[2]);
                if(vidaRestante<0){
                    fecha=new Date();
                    this.historico.push(fecha+defensor.nombre+"ha derrotado con el arma "+defensor.arma[0]+"haciendo "+defensor.arma[2]+"puntos de daño a"+ atacante.nombre+", que era de tipo "+atacante.tipo);
                }
            }
        }
    }

    encontrarMonstruo(){
        let validadorVidas=false;
        for(let vida of this.criaturas.vida)
            if(vida>0)
                validadorVidas=true;

        if (validadorVidas==true){
            do{
            let criaturavalida=(Math.floor(Math.random(1, criaturas.lenght)*criaturas.lenght));
            }while(criatura[criaturavalida].vida<0);
            return criaturavalida;
        }
    }
}