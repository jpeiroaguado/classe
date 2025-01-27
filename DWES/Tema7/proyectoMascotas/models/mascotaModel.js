import Mascota from '../schemas/mascotaSchema.js';

class mascotaModel {
 
  async create(mascota) {
    return await Mascota.create(mascota);
  }

  async getAll(){
    return await Mascota.find();
  }

  async getOne(id){
    return await Mascota.findById(id);
  }

  async update(id, mascota) {
    return await Mascota.findByIdAndUpdate(id, mascota, { new: true });
  }

  async delete(id) {
    return await Mascota.findByIdAndDelete(id);
  }

}

export default new mascotaModel;
