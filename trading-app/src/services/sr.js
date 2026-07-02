

const TOKEN = "TGRMeWNTQkd0OFBhcmVheDRDRHZuQW szU2dMbXc4M0xRVXVySEI1bkVEUT0";

fetch("https://api.marketdata.app/v1/stocks/quotes/AAPL/", {
    headers: {
        Authorization: `Bearer ${TOKEN}`
    }
})
.then(res => res.json())
.then(data => console.log(data))
.catch(err => console.error(err));