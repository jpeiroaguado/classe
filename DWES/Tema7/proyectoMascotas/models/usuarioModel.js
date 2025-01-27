import Usuario from '../schemas/usuarioSchema.js';

class usuarioModel{
  constructor(){

  }
  async getAll(){
    return await Usuario.find();
  }
  async getOneById(id){
    return await Usuario.findById(id);
  }
  async getOne(filtro){
    return await Usuario.findOne(filtro);
  }
  async create(usuario){
    return await Usuario.create(usuario);
  }
  async update(id, usuario){
    return await Usuario.findByIdAndUpdate(id, usuario, { new:true });
  }
  async delete(id){
    return await Usuario.delete(id);
  }

}

export default new usuarioModel();