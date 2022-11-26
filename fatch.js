

fetch('https://corona.lmao.ninja/v3/covid-19/countries/Nepal')
    .then((response) => {
        return (response.json());
    })
    .then(data => {


        totalcases = data.cases;
        deaths = data.deaths;
        recovered = data.recovered;
        country = data.country;
        flag = data.flag
        console.log(flag);

        var results = document.getElementById('results');

        var template = `
    <div class="covid19container">
    <div class="covid__hero_container">
    <div class="covid__hero"><img src="img/covid19.gif" alt="" class="covid__img"></div>
    </div>
    <div class="covid__content">
    <div class="covid__stats">
    `

        template += `
    <div class="covid__stat cases">कुल संक्रमित: `+ formatNumber(totalcases) + ` </div>
    <div class="covid__stat deaths" style="color:red">मृत्यु: `+ formatNumber(deaths) + ` </div>
    <div class="covid__stat recovered" style="color:green">निको: `+ formatNumber(recovered) + `</div>
    </div>
    <div class="covid__location">नेपाल
    </div>

    </div>
    </div>
 
        `


        results.innerHTML = template;



    })
function formatNumber(number) {
    number = number.toFixed(0) + '';
    x = number.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}





