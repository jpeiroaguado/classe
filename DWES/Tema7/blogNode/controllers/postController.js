class postController{
  constructor(){

  }
  
  async getOne (req, res){
    try{
      const {id}=req.params;
      const data=await postModel.getOne(id);
      res.status(200).json(data);
    }catch (e){
      res.status(500).send(e);
    }
  }

  async getAll (req, res){
    try{
      const data=await postModel.getAll();
      res.status(200).json(data);
    }catch (e){
      res.status(500).send(e);
    }
  }

  async create (req, res){
    try{
      const data=await postModel.create(req.body);
      res.status(201).json(data);
    }catch (e){
      res.status(500).send(e);
    }
  }
  async update (req, res){
    try{
      const {id}=req.params;
      const data=await postModel.update(id, req.body);
      res.status(200).json(data);
    }catch (e){
      res.status(500).send(e);
    }
  }
  async delete (req, res){
    try{
      const {id}=req.params;
      const data=await postModel.delete(id);
      res.status(204).sent(e);
    }catch (e){
      res.status(500).send(e);
    }
  }
}

export default new postController();