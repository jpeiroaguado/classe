import mongoose from "mongoose";

const usuarioSchema=new mongoose.Schema(
  {
    email:{
      type: String,
      required: [true, 'El email es obligatorio'],
      unique: true,
    },
    nombre:{
      type: String,
      required: [true, 'El nombre es obligatorio'],
    },
    password:{
      type: String,
      required: [true, 'El password es obligatorio'],
      minlenght: [6, 'La longitud mínima del password es 6'],
    }
  }, { timestamps: true}
);

export default mongoose.model("usuario", usuarioSchema);