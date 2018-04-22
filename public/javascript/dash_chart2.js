let ctx2 = document.getElementById('myChart2');

























var config = {
    type: 'pie',
    data: {
        datasets: [{
            data: [
               10,20,30,50,60
            ],
            backgroundColor: [
                'red',
                'red',
                'red',
                'red',
                'red',
            ],
            label: 'Dataset 1'
        }],
        labels: [
            'Red',
            'Orange',
            'Yellow',
            'Green',
            'Blue'
        ]
    },
    options: {
        responsive: true
    }
};
let c2 = new Chart(ctx2,config);