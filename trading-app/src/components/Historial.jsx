function Historial() {

    return (

        <div className="card shadow mt-4">

            <div className="card-header">

                Historial

            </div>

            <div className="card-body">

                <table className="table table-bordered">

                    <thead>

                        <tr>

                            <th>Fecha</th>

                            <th>Tipo</th>

                            <th>Acción</th>

                            <th>Cantidad</th>

                            <th>Precio</th>

                        </tr>

                    </thead>

                    <tbody id="tablaHistorial">

                    </tbody>

                </table>

            </div>

        </div>

    );

}

export default Historial;