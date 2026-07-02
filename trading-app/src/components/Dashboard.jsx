function Dashboard() {
    return (
        <>
            <div className="row">

                {/* COMPRA */}
                <div className="col-lg-4">

                    <div className="card shadow">

                        <div className="card-header bg-success text-white">
                            Comprar / Vender
                        </div>

                        <div className="card-body">

                            <label className="form-label">
                                Acción
                            </label>

                            <input
                                id="symbol"
                                className="form-control"
                                placeholder="Ejemplo: AAPL"
                            />

                            <br />

                            <label className="form-label">
                                Cantidad
                            </label>

                            <input
                                id="cantidad"
                                type="number"
                                className="form-control"
                                defaultValue={1}
                            />

                            <br />

                            <button
                                id="btnConsultar"
                                className="btn btn-primary w-100">

                                Consultar Precio

                            </button>

                            <br />
                            <br />

                            <h5>Precio Actual</h5>

                            <h2 id="precioActual">
                                $0.00
                            </h2>

                            <hr />

                            <button
                                id="btnComprar"
                                className="btn btn-success w-100">

                                Comprar

                            </button>

                            <br />
                            <br />

                            <button
                                id="btnActualizar"
                                className="btn btn-warning w-100">

                                Actualizar Mercado

                            </button>

                        </div>

                    </div>

                </div>

                {/* PANEL DERECHO */}

                <div className="col-lg-8">

                    <div className="row">

                        <div className="col-md-3">
                            <div className="card text-center shadow">
                                <div className="card-body">
                                    <h6>Saldo Disponible</h6>
                                    <h3 id="saldo">$100000.00</h3>
                                </div>
                            </div>
                        </div>

                        <div className="col-md-3">
                            <div className="card text-center shadow">
                                <div className="card-body">
                                    <h6>Capital Invertido</h6>
                                    <h3 id="capital">$0</h3>
                                </div>
                            </div>
                        </div>

                        <div className="col-md-3">
                            <div className="card text-center shadow">
                                <div className="card-body">
                                    <h6>Valor Actual</h6>
                                    <h3 id="valorActual">$0</h3>
                                </div>
                            </div>
                        </div>

                        <div className="col-md-3">
                            <div className="card text-center shadow">
                                <div className="card-body">
                                    <h6>Ganancia / Pérdida</h6>
                                    <h3 id="ganancia">$0</h3>
                                </div>
                            </div>
                        </div>

                    </div>

                    <br />

                    <div className="row">

                        <div className="col-md-4">
                            <div className="card text-center shadow">
                                <div className="card-body">
                                    <h6>Total de Acciones</h6>
                                    <h3 id="totalAcciones">0</h3>
                                </div>
                            </div>
                        </div>

                        <div className="col-md-4">
                            <div className="card text-center shadow">
                                <div className="card-body">
                                    <h6>Total de Operaciones</h6>
                                    <h3 id="totalOperaciones">0</h3>
                                </div>
                            </div>
                        </div>

                        <div className="col-md-4">
                            <div className="card text-center shadow">
                                <div className="card-body">
                                    <h6>Rentabilidad</h6>
                                    <h3 id="rentabilidad">0 %</h3>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </>
    );
}

export default Dashboard;