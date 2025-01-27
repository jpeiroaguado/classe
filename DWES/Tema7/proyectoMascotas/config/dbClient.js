import "dotenv/config";
import mongoose from "mongoose";

class dbClient {

  constructor() {
    this.conectarBD();
  }

  async conectarBD() {
    try{
    const queryString = `mongodb+srv://${process.env.USER_DB}:${process.env.PASSWORD_DB}@${process.env.SERVER_DB}/adopcion?retryWrites=true&w=majority`;
    await mongoose.connect(queryString);
    console.log("Conexión a la base de datos OK");
    }catch(e){
      console.log(e);
    }
  }

  async cerrarConexion(){
    try{
      await mongoose.disconnect();
      console.log("Conexión a la base de datos cerrada");
    }catch(e){
      console.log("Error al cerrar la conexión ",e);
    }
  }

}

export default new dbClient();
