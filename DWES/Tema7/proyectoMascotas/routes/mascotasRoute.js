import express from "express";
const route = express.Router();
import mascotasController from '../controllers/mascotasController.js';

route.get('/', mascotasController.getAll);
route.get('/:id', mascotasController.getOne);
route.post('/', mascotasController.create);
route.put('/:id', mascotasController.update);
route.delete('/:id', mascotasController.delete);

export default route;