import express from "express";
import usuarioController from "../controllers/usuarioController.js";7
import { verificarToken } from "../helpers/authentification.js";

const route= express.Router();

route.post('/registro', usuarioController.registrar);
route.post('/login', usuarioController.login);

export default route;