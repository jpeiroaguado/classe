import "dotenv/config";
import express from "express";
import routePost from "./routes/postRoute.js";
import bodyParser from "body-parser";

const app = express();
app.use(bodyParser.json());//Express açí gestiona els json
app.use(bodyParser.urlencoded({extended:true}));//Gestio de formularis

app.use("/posts", routePost);

try{
  const PORT=process.env.PORT || 3000;
  app.listen(PORT, ()=> console.log("Servidor activo en el puerto: "+PORT));
}catch (e){
  console.log(e);
}