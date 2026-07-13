const express = require('express');
const cors = require('cors');
const pool = require('./db');

const app = express();

// Middleware
app.use(cors());
app.use(express.json());

// Ruta de prueba
app.get('/hola-mundo', (req, res) => {
  res.send('Hello World!');
});

/*
CREATE TABLE personas (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100) NOT NULL
);
*/

// ======================================
// OBTENER TODAS LAS PERSONAS
// ======================================
app.get('/personas', async (req, res) => {
  try {
    const resultado = await pool.query(
      'SELECT * FROM personas ORDER BY id'
    );

    res.json(resultado.rows);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// ======================================
// OBTENER UNA PERSONA POR ID
// ======================================
app.get('/personas/:id', async (req, res) => {
  try {
    const { id } = req.params;

    const resultado = await pool.query(
      'SELECT * FROM personas WHERE id = $1',
      [id]
    );

    if (resultado.rows.length === 0) {
      return res.status(404).json({
        error: 'Persona no encontrada'
      });
    }

    res.json(resultado.rows[0]);

  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// ======================================
// CREAR PERSONA
// ======================================
app.post('/personas', async (req, res) => {
  try {

    const {
      nombre,
      apellido_paterno,
      apellido_materno
    } = req.body;

    const resultado = await pool.query(
      `INSERT INTO personas
      (nombre, apellido_paterno, apellido_materno)
      VALUES ($1, $2, $3)
      RETURNING *`,
      [
        nombre,
        apellido_paterno,
        apellido_materno
      ]
    );

    res.status(201).json(resultado.rows[0]);

  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// ======================================
// ELIMINAR PERSONA
// ======================================
app.delete('/personas/:id', async (req, res) => {
  try {

    const { id } = req.params;

    const resultado = await pool.query(
      'DELETE FROM personas WHERE id = $1 RETURNING *',
      [id]
    );

    if (resultado.rows.length === 0) {
      return res.status(404).json({
        error: 'Persona no encontrada'
      });
    }

    res.json({
      mensaje: 'Persona eliminada correctamente'
    });

  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// ======================================
// ACTUALIZAR COMPLETAMENTE (PUT)
// ======================================
app.put('/personas/:id', async (req, res) => {

  const { id } = req.params;

  const {
    nombre,
    apellido_paterno,
    apellido_materno
  } = req.body;

  try {

    const resultado = await pool.query(
      `UPDATE personas
       SET nombre = $1,
           apellido_paterno = $2,
           apellido_materno = $3
       WHERE id = $4
       RETURNING *`,
      [
        nombre,
        apellido_paterno,
        apellido_materno,
        id
      ]
    );

    if (resultado.rows.length === 0) {
      return res.status(404).json({
        error: 'Persona no encontrada'
      });
    }

    res.json({
      mensaje: 'Persona actualizada correctamente',
      persona: resultado.rows[0]
    });

  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// ======================================
// ACTUALIZAR PARCIALMENTE (PATCH)
// ======================================
app.patch('/personas/:id', async (req, res) => {

  const { id } = req.params;
  const campos = req.body;

  if (Object.keys(campos).length === 0) {
    return res.status(400).json({
      error: 'No se enviaron campos para actualizar'
    });
  }

  try {

    const llaves = Object.keys(campos);
    const valores = Object.values(campos);

    const setQuery = llaves
      .map((llave, index) =>
        `${llave} = $${index + 1}`
      )
      .join(', ');

    const query = `
      UPDATE personas
      SET ${setQuery}
      WHERE id = $${llaves.length + 1}
      RETURNING *
    `;

    const resultado = await pool.query(
      query,
      [...valores, id]
    );

    if (resultado.rows.length === 0) {
      return res.status(404).json({
        error: 'Persona no encontrada'
      });
    }

    res.json({
      mensaje: 'Persona actualizada correctamente',
      persona: resultado.rows[0]
    });

  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// ======================================
// INICIAR SERVIDOR
// ======================================
const PORT = 4000;

app.listen(PORT, () => {
  console.log(
    `Servidor escuchando en http://localhost:${4000}`
  );
});