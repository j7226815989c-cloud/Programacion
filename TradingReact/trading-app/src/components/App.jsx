import Navbar from "./components/Navbar";
import Sidebar from "./components/Sidebar";

function App() {

    return (

        <>

            <Navbar />

            <div className="container-fluid mt-4">

                <div className="row">

                    <div className="col-lg-2">

                        <Sidebar />

                    </div>

                    <div className="col-lg-10">

                        <div className="card shadow">

                            <div className="card-body">

                                <h2>

                                    Trading App React

                                </h2>

                                <p>

                                    Proyecto de compra y venta de acciones.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </>

    );

}

export default App;