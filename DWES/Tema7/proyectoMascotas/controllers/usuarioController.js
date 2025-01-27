import usuarioModel from "../models/usuarioModel.js";
import bcrypt from "bcrypt";
import { generarToken } from "../helpers/authentification.js";

class usuarioController{
  constructor(){

  }
  async registrar(req, res){
    try{
      const{email, nombre, password} = req.body;
      const usuarioExiste=await usuarioModel.getOne({email});

      if(password.length <= 5){
        return res.status(400).json({error: "La longitud debe ser mayor de 5"});
      }
      if(usuarioExiste){
        return res.status(400).json({error: "El usuario ya existe"});//Si existe terminamos
      }

      const password_encriptado= await bcrypt.hash(password, 10);//Encriptamos el password

      const data=await usuarioModel.create({//Lo añadimos
        email,
        nombre,
        password: password_encriptado,
      });

      res.status(201).json(data);

    }catch(e){
      res.status(500).send(e);
    }
  }

  async login(req, res){
    const {email, password}=req.body;

    const usuarioExiste=await usuarioModel.getOne({email});

    if(!usuarioExiste){
      return res.status(400).json({ error: "No existe ningún usuario con este email"});
    }
    const passwordValido=await bcrypt.compare(password, usuarioExiste.password);

    if(!passwordValido){
      return res.status(400).json({ error: "Password incorrecto"});
    }

      const token=generarToken(email);
      return res.status(200).json({token});
  }
}

export default new usuarioController();