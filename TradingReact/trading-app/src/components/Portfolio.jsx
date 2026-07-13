function Portfolio() {

    return (

        <div className="card shadow mt-4">

            <div className="card-header">

                Mi Portafolio

            </div>

            <div className="card-body">

                <table className="table table-striped table-hover">

                    <thead>

                        <tr>

                            <th>Acción</th>

                            <th>Cantidad</th>

                            <th>Precio Compra</th>

                            <th>Precio Actual</th>

                            <th>Ganancia</th>

                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody id="tablaPortafolio">

                    </tbody>

                </table>

            </div>

        </div>

    );

}

export default Portfolio;