@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="row">
        <div class="col-md-4">
            <h1>{{ $module->name }}</h1>
            <p>{{ $module->description }}</p>
            <p>Status: {{ $module->status ? 'Active' : 'Inactive' }}</p>
            <p>Current Measured Value: {{ $currentValue }}</p>
            <p>Operation Duration: {{ $operatingDuration }}</p>
            <p>Number of Data Sent: {{ $numberOfDataSent }}</p>
        </div>
        <div class="col-md-8">
            <div style="width: 100%; height: 800px;">
                <canvas id="moduleChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('moduleChart').getContext('2d');
    var moduleData = @json($histories);

    var dates = moduleData.map(function(history) {
        // Convertir la date au format JavaScript Date
        var date = new Date(history.created_at);
        // Formater la date au format YYYY-MM-DD HH:mm:ss
        return date.toISOString().slice(0, 19).replace('T', ' ');
    });

    var values = moduleData.map(function(history) {
        return history.value;
    });
    
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Module Data',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: values,
                fill: false,
                tension: 0.1,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        parser: 'YYYY-MM-DD HH:mm:ss', 
                        tooltipFormat: 'YYYY-MM-DD HH:mm:ss', 
                        displayFormats: {
                            day: 'YYYY-MM-DD' 
                        }
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Date'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
        }
    });
</script>
@endsection
