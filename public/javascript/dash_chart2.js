let ctx2 = document.getElementById('myChart2');


function diff_type(data){
    let tmp_ = [];

    //data <- tmp_.sort();
    data.forEach(ele => {

    })

}

function subType_sub(type_date){
    let tmp_ = [];
    array_income_temp.forEach(ele => {
        if(ele.typeMoney == type_date){
            tmp_.push(ele.subType)
            
        }
    })
    let diff_type_keep = diff_type(tmp_.sort());

    return diff_type_keep;
}




console.log(subType_sub('รายจ่าย'))















var config = {
    type: 'pie',
    data: {
        datasets: [{
            data: [
               10,20,30,50,60
            ],
            backgroundColor: [
                '#FFC721',
                '#E8660C',
                '#FF0000',
                '#ff3a3a',
                '#fbff39',
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