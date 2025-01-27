import jsonwebtoken from 'jsonwebtoken';

  export function generarToken(email){
    return jsonwebtoken.sign({email}, process.env.JSON_TOKEN_SECRET, {
      expiresIn: "1h",
    });
}
export function verificarToken(req, res, next){
  const token= req.header('Authorization')?.replace('Bearer ', '');
  
  if(!token){//Si on tenim token
    return res.status(401).json({err: "Token no válido"});
  }
  try{
    const tokenData=jsonwebtoken.verify(token, process.env.JSON_TOKEN_SECRET);
    console.log(tokenData.email);
    next();
  }catch(e){
    res.status(500).send(e);
  }
}