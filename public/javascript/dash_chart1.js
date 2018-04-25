var ctx = document.getElementById("myChart");

const day_7 = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
let day_value = [0, 0, 0, 0, 0, 0, 0];

function show_diff(type) { /** เอาข้อมูลทั้งหมดที่มีค่า น้อยกว่า 7 วัน เก็บใส่ในตัวแปล data ชนิด type == รายจ่าย  */
    let data = [],
        max = 0;
    array_income_temp.forEach((ele, k) => {
        max = check_min_7(ele.create_at.split(' ').slice(0, 10))
        if ((max <= 7) && (ele.typeMoney == type)) {
            data.push({
                date_a: ele.create_at,
                money: ele.moneyInput
            })
        }
    })
    return data
}

function set_money_of_day(day, array) {/** day คือ ตัวแปลวันที่ แยกมาแล้วว่า เป็นวันทที่ไม่ซ่ำกัน array */
    let t_1 = [],
        t_2 = [];
    let num_day = day.length;
    array.forEach(ele => {
        for (let j = 0; j < num_day; j++) {
            if (ele.date_a.slice(0, 10) == day[j]) {
                if (t_1[j] == null) t_1[j] = 0;
                t_1[j] += parseInt(ele.money)
            }
        }
    })


    return t_1; /** จำนวนเงิน ของแต่ละวัน */
}

function day_set_ch(temp_static) {
    let temp_day = [],
        temp_day2 = [],
        temp_day3 = [],
        temp_day4 = [];

    temp_static.forEach(ele => {
        temp_day2.push(ele.date_a) //temp_day.push(diff_day_f(ele.date_a))
    })
    temp_day3 = diff_day_f(temp_day2.sort()); /** diff_day_f นำมาจาก function ในไฟล์ หลัก คือ /income/pages/income  dashboard */

    temp_day_4 = set_money_of_day(temp_day3, temp_static);

    return temp_day = {
        date_fo: temp_day3,
        money_of: temp_day_4
    };/** ข้อมูลทั่งหมดของ รายจ่าย */
}


function set_data_onMyChart_1() {/** */
    let temp_ = [];
    let day_asdfg = day_set_ch(show_diff('รายจ่าย'));
    day_asdfg.date_fo.forEach((ele, i) => {
        temp_.push({
            date: new Date(ele),
            money: day_asdfg.money_of[i]
        })
    })
    return temp_;
   
}
//set_data_onMyChart_1();
function insert_data(data_insert) {/** เซ็ตตำแหน่งวัน ให้ตรงกับ เงินที่ได้ในวันนี้นๆ */
    let temp_ = [0, 0, 0, 0, 0, 0, 0];
    let data = data_insert; // ข้อมูลทั้งหมดของจำนวนเงินที่ ตำแน่ง array จะตรงกับวันๆ นั้น
    let num_d_7 = day_7.length; // จำนวนวัน Sun - Sat
    data.forEach(ele => {
        for (let i = 0; i < num_d_7; i++) {

            if (ele.date.toString().slice(0, 3) == day_7[i]) {
                temp_[i] = ele.money;
                break;
            }
        }
    });
    return temp_;
}
let data_for_insert = insert_data(set_data_onMyChart_1()) /** จำนวนเงินของแต่ละวัน */


let c1 = new Chart(ctx, myChart_1(data_for_insert, day_7)) /** main for chart */
function myChart_1(data, day) {
    return {
        type: 'bar',
        data: {
            labels: day,
            datasets: [{
                label: 'ราย่จายข้องอาทิตนี้',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };
}