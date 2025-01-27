class Persona{
  constructor(nom, edat){
    this.nom=nom;
    this.edat=edat;
  }

  mostrar(){
    return `Me llamo ${this.nom} y tengo ${this.edat}`;
  }
}
  module.exports=Persona;