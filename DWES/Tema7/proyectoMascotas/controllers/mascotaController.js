import mascotaModel from "../models/mascotaModel.js";

class mascotaController {
  constructor() {}

  async getOne(req, res) {
    try {
        const { id } = req.params;
        const data = await mascotaModel.getOne(id);
        res.status(201).json(data);
    } catch (e) {
      res.status(500).send(e);
    }
  }

  async getAll(req, res) {
    try {
      const data = await mascotaModel.getAll();
      res.status(201).json(data);
    } catch (e) {
      res.status(500).send(e);
    }
  }

  async create(req, res) {
    try {
      const data = await mascotaModel.create(req.body);
      res.status(201).json(data);
    } catch (e) {
      res.status(500).send(e);
    }
  }

  async update(req, res) {
    try {
        const { id } = req.params;
        const data = await mascotaModel.update(id, req.body);
        res.status(200).json(data);
    } catch (e) {
        console.log(e);
      res.status(500).send(e);
    }
  }

  async delete(req, res) {
    try {
        const { id } = req.params;
        const data = await mascotaModel.delete(id);
        res.status(206).json(data);
    } catch (e) {
      res.status(500).send(e);
    }
  }
}

export default new mascotaController;
