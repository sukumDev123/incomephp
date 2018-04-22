let ctx2 = document.getElementById('myChart2');


function diff_type(data) {
    let tmp_ = [];
    let i = 0;
    //data <- tmp_.sort();
    data.forEach(ele => {
        if (tmp_[i - 1] != ele) {
            tmp_[i] = ele;
            i++;
        }
    })
    return tmp_;

}

function cal_f_money_function(subType, data,type_date) {
    let t_m = [];
    let subTypeN = subType.length;
    data.forEach((ele) => {
        for (let i = 0; i < subTypeN; i++) {
            if (ele.typeMoney == type_date) {
                if (ele.subType == subType[i]) {
                    if (t_m[i] == null) t_m[i] = 0;
                    t_m[i] += parseInt(ele.moneyInput);
                }
            }

        }
    })

    return t_m;
}

function subType_sub(type_date) {
    let tmp_ = [],
        money_ = [],
        i = 0;
    let a_i_t_n = array_income_temp.length;
    if (a_i_t_n != 0) {
        array_income_temp.forEach(ele => {
            if (ele.typeMoney == type_date) {
                tmp_.push(ele.subType)
            }
        })
        let t_num = tmp_.length;
        if (t_num != 0) {
            let diff_type_keep = diff_type(tmp_.sort()); /** แยกชนิดย่อยทั่งหมดเรียบร้อย */
            let cal_f_money = cal_f_money_function(diff_type_keep, array_income_temp, type_date)
            return {
                day: diff_type_keep,
                money_selete: cal_f_money
            };
        } else {
            return 0;
        }


    } else {
        return 0;
    }

    /** 
    
    ทำการคำนวณเงินย่อย */
}

function first_in_page() {
    let {
        day,
        money_selete
    } = subType_sub('รายจ่าย');

    let c2 = new Chart(ctx2, setChart2(day, money_selete));


}
console.log(subType_sub('รายจ่าย'))

function setChart2(labels, data) {
    return {
        type: 'pie',
        data: {
            datasets: [{
                data: data,
                backgroundColor: [
                    '#FFC721',
                    '#E8660C',
                    '#FF0000',
                    '#ff3a3a',
                    '#fbff39',
                ],
                label: 'Dataset 1'
            }],
            labels: labels
        },
        options: {
            responsive: true
        }
    }
}

first_in_page(); // page star //;