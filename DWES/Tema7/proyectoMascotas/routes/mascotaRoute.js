import express from "express";
const route = express.Router();
import mascotaController from '../controllers/mascotaController.js';
import { verificarToken } from "../helpers/authentification.js";

route.get('/', mascotaController.getAll);
route.get('/:id', mascotaController.getOne);
route.post('/', mascotaController.create);
route.put('/:id',verificarToken, mascotaController.update);
route.delete('/:id', verificarToken, mascotaController.delete);

export default route;