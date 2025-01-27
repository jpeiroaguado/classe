import mongoose from "mongoose";

const mascotaSchema = mongoose.Schema(
  {
    nombre: {
      type: String,
      required: [true, 'El nombre es obligatorio.'],
    },
    tipo: {
      type: String,
      required: [true, 'El tipo de mascota es obligatorio.'],
      enum: {
        values: ['perro', 'gato', 'reptil'],
        message: '{VALUE} no es un tipo válido de mascota. Debe ser uno de: perro, gato o reptil.',
      },
    },
    raza: {
      type: String,
      message: 'La raza debe ser un texto válido.',
    },
    edad: {
      type: Number,
      min: [0, 'La edad no puede ser menor que 0.'],
      max: [30, 'La edad no puede ser mayor que 30.'],
      message: 'La edad debe ser un número entre 0 y 30.',
    },
    adoptado: {
      type: Boolean,
      default: false,
      message: 'El campo adoptado debe ser un valor booleano (true o false).',
    },
    descripcion: {
      type: String,
      message: 'La descripción debe ser un texto válido.',
    },
  },
  { timestamps: true }
);

export default mongoose.model("mascotas", mascotaSchema);
