
import express from "express";
const route=express.Router();
import postController from '../controllers/postController.js';


route.get('/', postController.getAll);//Index
route.get('/:id', postController.getOne);//Show

route.post('/', postController.create);//Crear
route.put('/:id', postController.update)//Actualitzar
route.delete('/:id', postController.delete);//Delete

export default route;