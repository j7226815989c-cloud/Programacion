import { useEffect, useRef } from "react";
import Chart from "chart.js/auto";
function Grafica() {

    return (

        <div className="card shadow">

            <div className="card-header">

                Comportamiento de la Acción

            </div>

            <div className="card-body">

                <canvas id="grafica"></canvas>

            </div>

        </div>

    );

}

export default Grafica;