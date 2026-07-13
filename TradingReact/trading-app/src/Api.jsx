const TOKEN = "TGRMeWNTQkd0OFBhcmVheDRDRHZuQW szU2dMbXc4M0xRVXVySEI1bkVEUT0";

export async function obtenerPrecio(simbolo) {

    const respuesta = await fetch(
        `https://api.marketdata.app/v1/stocks/quotes/AAPL/`,
        {
            headers: {
                Authorization: `Bearer ${TOKEN}`
            }
        }
    );

    return await respuesta.json();

}