const express = require('express');
const axios = require('axios');

const app = express();
const PORT = 3000;


//Pots fer peticions api rest,funcions asincrones i promeses amb la mateixa sintaxi que faríes a javascript normal. 
//Necesites express com en get
app.get('/random-image', async (req, res) => {
    try {
        // Solicitud a la API
        const response = await axios.get('https://picsum.photos/200/300', {
            responseType: 'stream' //Es de axios, per a configurar la resposta en binari.
        });

        res.setHeader('Content-Type', 'image/jpeg');

        // Envie la imatge
        response.data.pipe(res);

    } catch (error) {
        console.error('Error al obtener la imagen:', error);
        res.status(500).send('Hubo un problema al cargar la imagen.');//Errors
    }
});

app.listen(PORT, () => {//Li diguem que escolte el port 3000 que es el de Axios
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});
