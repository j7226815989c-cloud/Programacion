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

                        {/* Aquí irán los demás componentes */}

                    </div>

                </div>

            </div>

        </>
    );
}

export default App;