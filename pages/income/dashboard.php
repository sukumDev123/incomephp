<?php
    $array_json = [] ;
    $i= 0 ;
    $selete_data_income = cmdDb("SELECT * FROM incomeDB WHERE userId=".$user->idUser."");
    if(num_I($selete_data_income) > 0){
        while($row = $selete_data_income->fetch_array()){
            $array_json[$i] = ['incomeId'=>$row['incomeId'],'moneyInput' => $row['moneyInput'] , 'typeMoney' => $row['typeMoney'],'detail' => $row['detail'],'subType' => $row['subType'],'create_at' => $row['create_at']];
            $i++;
        }
    }
    $json_e = json_encode($array_json);

?>

<script>
    const dataOfincome = <?php echo $json_e ?>;
    let temp_i = 0 , temp_s = 0 , temp_o = 0;
    var array_income_temp = [];
    let save_values_ = {}; /** เก็บตัวแปล temp_i and s and o */
    let diff_day = [];
    function numMoney(money,type){
        if(type == 'รายรับ'){
            temp_i += parseInt(money);
        }else if(type =='รายจ่าย'){
            temp_o += parseInt(money);

        }else if(type == 'เงินอมม'){
            temp_s += parseInt(money);

        }
    }
    function diff_day_f(data){
        let temp_ = [];
        let i = 0 ;
        data.forEach(ele => {
            if(ele.slice(0,10) != temp_[i-1]){
                temp_[i] = ele.slice(0,10);
                i++;
            }
        })
        return temp_;
    }
    function check_min_7(date) {
        let date_start = new Date(date);
        let date_end = new Date();
        var startA = Date.parse(date_start);
        var endA = Date.parse(date_end)
        var gg = endA - startA;
        var num_days = ((gg % 31536000000) % 2628000000) / 86400000; // day
        let res = 0;
        res = Math.round(num_days); // day
        return res;

}
    function onlyMonthNow(date_num){
        let temp_day = [];
        dataOfincome.forEach(ele => {
            if(ele.create_at.split(' ')[0].slice(0,7) == date_num.slice(0,7)){
                array_income_temp.push(ele);
                if(ele.typeMoney =='รายจ่าย'){
                    temp_day.push(ele.create_at);
                }
            }
        });
        diff_day = diff_day_f(temp_day.sort());
        
    }
    function num_i_s_o(){
       
        array_income_temp.forEach(ele => {
            numMoney(ele.moneyInput,ele.typeMoney);
        })

        save_values_ = {
            income : temp_i , out : temp_o , save : temp_s , i_andS : (temp_i - temp_o) , diff_day : ( (temp_o != 0) ? temp_o / diff_day.length : 0 )
        }
        return save_values_;
    }
    function money_two_l(money){
        return money.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    }
    onlyMonthNow(new Date().toISOString());
    
    $(document).ready(function(){
        
        let valuesOfmoney = num_i_s_o();
        $('#income_label').text(money_two_l(valuesOfmoney.income) );
        $('#out_label').text(money_two_l(valuesOfmoney.out) );
        $('#i_andS_label').text(money_two_l(valuesOfmoney.i_andS) );
        $('#day_diff_label').text(money_two_l(valuesOfmoney.diff_day));
        var total_income_month = array_income_temp;
       
        
    })
</script>


<div class="container">

    <div class="col-12 text-center p-3">
        <h1 style='color:red'>Dash Board</h1>
    </div>
    <div class="row text-center p-3">
        <div class="col-12   col-md-3 ">
            <div class="p-3 bb">
                <h5 for="เงินเปลี่ย"> เงินเฉลี่ยของเดือนนี้
                    <br> <label id='day_diff_label'></label>   บาท
                </h5>




            </div>
        </div>
        <div class="col-12 col-md-3 ">
            <div class="p-3 bb">
                <label>รายรับทั่งหมด เดือนนี้
                    <br>  <label id='income_label'></label>  บาท </label>
            </div>

        </div>
        <div class="col-12 col-md-3 ">
            <div class="p-3 bb">
                <label>รายจ่ายทั่งหมด เดือนนี้
                    <br> <label id='out_label'></label> บาท </label>
            </div>
        </div>
        <div class="col-12 col-md-3 ">
            <div class="p-3 bb">
                <label>เงินคงเหลือ
                    <br>  <label id='i_andS_label'></label> บาท </label>
            </div>
        </div>
    </div>
    <div class="row">
       
        <div class="col-12" style='margin-bottom:10px;'>
            <div class='p-3 bb'>
                <div class="text-right">
                   

                </div>
                <h3 style='color:red;text-align: center'> ตารางกราฟแสดงผล</h3>
                <canvas id="myChart" height='100px' ></canvas>
            </div>
        </div>

        <div class="col-12 bb col-md-6 col-lg-4 p-3 ">
            <div class="p-3">

                <h3 style='color:red;'>
                    รายารสิ่งของที่กำลังจะได้
                </h3>
                <div class="md-form p-2">
                    <input type="text" placeholder="ค้นหารายการสิ่งของที่อยากได้" class="form-control">
                </div>
                <div class='table_over'>
                    <table>
                        <tr>
                            <th>ชื่อรายการ</th>
                            <th>เหลืออีกเท่าไหร่</th>
                            <th>ลบ</th>
                        </tr>
                        <tr>
                            <td>MacbookPro</td>
                            <td>1200</td>
                            <td><a style='color:red'>ลบ</a></td>
                        </tr>
                    </table>
                </div>
                <div class='text-right p-2'>
                    <h5>ยอดเงินเก็บทั่งหมด
                        <br> 90,000.00 บาท</h5>
                </div>
            </div>

        </div>
        <div class='col-12 col-md-6 col-lg-8 '>
            <div class="p-3 bb">
            <h3 class="text-center p-3" style='color:red' >แสดงความถี่ของการซื้อต่อหนึ่งเดือน</h3>

            <canvas id="myChart2" ></canvas>
                
                
            </div>



        </div>

    </div>
    
</div>

<script src="/income/public/javascript/dash_chart1.js"></script>
<script src="/income/public/javascript/dash_chart2.js"></script>