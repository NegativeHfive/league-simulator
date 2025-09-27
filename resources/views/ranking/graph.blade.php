<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/graph.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

     <div class="links" style="display: flex; width: 100%; justify-content: space-evenly; margin-top: 3%;">
        <form action="{{ route('dashboard') }}" method="GET">
            <button type="submit" class="btn">Home</button>
        </form>

        <form action="{{ route('teams.index') }}" method="GET">
            <button type="submit" class="btn">Teams</button>
        </form>

        <form action="{{ route('match.index') }}" method="GET">
            <button type="submit" class="btn">Matches</button>
        </form>
        
        <form action="{{ route('ranking.index') }}" method="GET">
            <button type="submit" class="btn">Ranking</button>
        </form>
    </div>

   <div class="container" style="width: 100%; text-align: center; display: flex; justify-content: center;">
     <div class="tex" style="text-align: center; width: 70%;">
        <h1>Graph</h1>
        <p>This was made with Chart.js Chart.js is a free, open-source JavaScript library used for creating animated, responsive, and customizable charts on a website. It renders charts using the HTML5 element and supports a variety of chart types, including line, bar, pie, radar, and scatter plots. Its ease of use makes it popular for both developers and designers to visualize data on the web</p>
        <a href="">Export Data</a>
    </div>

   </div>
   <div class="graph" style="height: 800px; display: flex; flex-direction: row; justify-content: center;">
        <canvas id="myChart"></canvas>
    </div>

    
    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: @json($labels), 
            datasets: [{
                label: 'Team Wins',
                data: @json($wins),  
                backgroundColor: [
                    'red',
                    'blue',
                    'green',
                    'voilet',
                    'navy',
                    'beige',
                    'gold',
                    'pink',
                    'tomato',
                    'yellow',
                    'orange',
                    'indigo',
                    '#ffe0c1',
                    'gray',
                    'brown',
                    'olive',
                    '#a9d15e',
                    '#85b9d1',
                    '#db3261',
                    '#a6607c'
                ],
                borderColor: 'white',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
    </script>

    


    
</body>
</html>