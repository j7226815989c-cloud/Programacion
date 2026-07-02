import Navbar from "./components/Navbar";
import Sidebar from "./components/Sidebar";
import Dashboard from "./components/Dashboard";
import Grafica from "./components/Grafica";
import Portfolio from "./components/Portfolio";
import Historial from "./components/Historial";

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

                        <Dashboard />

                        <Grafica />

                        <Portfolio />

                        <Historial />

                    </div>

                </div>

            </div>

        </>

    );

}

export default App;