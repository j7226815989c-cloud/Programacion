const express = require('express');
const cors = require('cors');

const app = express();

app.use(cors());
app.use(express.json());

let productos = [
    {
        id: 1,
        nombre: 'Laptop',
        precio: 15000
    },
    {
        id: 2,
        nombre: 'Mouse',
        precio: 350
    }
];

app.get('/productos', (req, res) => {
    res.json(productos);
});

app.delete('/productos/:id', (req, res) => {

    const id = parseInt(req.params.id);

    productos = productos.filter(
        producto => producto.id !== id
    );

    res.json({
        mensaje: 'Producto eliminado'
    });

});

app.listen(3000, () => {
    console.log('Servidor iniciado en puerto 3000');
});