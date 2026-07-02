function ModalVenta() {

    return (

        <div
            className="modal fade"
            id="modalVenta"
            tabIndex="-1"
            aria-hidden="true"
        >

            <div className="modal-dialog">

                <div className="modal-content">

                    <div className="modal-header bg-danger text-white">

                        <h5 className="modal-title">

                            Vender Acciones

                        </h5>

                        <button
                            type="button"
                            className="btn-close btn-close-white"
                            data-bs-dismiss="modal"
                        >

                        </button>

                    </div>

                    <div className="modal-body">

                        <h5 id="tituloVenta">

                            Acción

                        </h5>

                        <label className="form-label">

                            Cantidad a vender

                        </label>

                        <input
                            id="cantidadVenta"
                            type="number"
                            className="form-control"
                            min="1"
                        />

                        <small
                            id="disponibles"
                            className="text-muted"
                        >

                        </small>

                    </div>

                    <div className="modal-footer">

                        <button
                            type="button"
                            className="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >

                            Cancelar

                        </button>

                        <button
                            id="btnConfirmarVenta"
                            className="btn btn-danger"
                        >

                            Confirmar Venta

                        </button>

                    </div>

                </div>

            </div>

        </div>

    );

}

export default ModalVenta;