function Sidebar() {

    return (

        <div className="list-group shadow">

            <button className="list-group-item list-group-item-action active">

                <i className="bi bi-cash-stack me-2"></i>

                Acciones

            </button>

            <button className="list-group-item list-group-item-action">

                <i className="bi bi-cart-plus me-2"></i>

                Comprar

            </button>

            <button className="list-group-item list-group-item-action">

                <i className="bi bi-cart-dash me-2"></i>

                Vender

            </button>

            <button className="list-group-item list-group-item-action">

                <i className="bi bi-wallet2 me-2"></i>

                Portafolio

            </button>

            <button className="list-group-item list-group-item-action">

                <i className="bi bi-clock-history me-2"></i>

                Historial

            </button>

        </div>

    );

}

export default Sidebar;