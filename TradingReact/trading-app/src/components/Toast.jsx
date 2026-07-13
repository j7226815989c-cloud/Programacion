function Toast() {

    return (

        <div className="toast-container position-fixed bottom-0 end-0 p-3">

            <div
                id="toastMensaje"
                className="toast text-bg-success border-0"
                role="alert"
                aria-live="assertive"
                aria-atomic="true"
            >

                <div className="d-flex">

                    <div
                        id="textoToast"
                        className="toast-body"
                    >

                        Mensaje

                    </div>

                    <button
                        type="button"
                        className="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"
                    >

                    </button>

                </div>

            </div>

        </div>

    );

}

export default Toast;