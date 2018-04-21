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
    let array_income_temp = [];
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
    function onlyMonthNow(date_num){
        let temp_day = [];
        dataOfincome.forEach(ele => {
            if(ele.create_at.split(' ')[0].slice(0,7) == date_num.slice(0,7)){
                array_income_temp.push(ele);
                if(ele.typeMoney =='รายจ่าย'){
                    temp_day.push(ele.create_at);
                }
            }
        })
        console.log(temp_day)
        diff_day = diff_day_f(temp_day.sort());
        
    }
    function num_i_s_o(){
       
        array_income_temp.forEach(ele => {
            numMoney(ele.moneyInput,ele.typeMoney);  
            
        })

        save_values_ = {
            income : temp_i , out : temp_o , save : temp_s , i_andS : (temp_i - temp_o) , diff_day : (temp_o / diff_day.length)
        }
        return save_values_;
    }
    function money_two_l(money){
        return money.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    }
    $(document).ready(function(){
        onlyMonthNow(new Date().toISOString());
        let valuesOfmoney = num_i_s_o();
        console.log(valuesOfmoney)
        $('#income_label').text(money_two_l(valuesOfmoney.income) );
        $('#out_label').text(money_two_l(valuesOfmoney.out) );
        $('#i_andS_label').text(money_two_l(valuesOfmoney.i_andS) );
        $('#day_diff_label').text(money_two_l(valuesOfmoney.diff_day));
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
                <label>รายรับทั่งหมดของเดือนนี้
                    <br>  <label id='income_label'></label>  บาท </label>
            </div>

        </div>
        <div class="col-12 col-md-3 ">
            <div class="p-3 bb">
                <label>รายจ่ายทั่งหมดของเดือนนี้
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
                <div zingchart id="chart-1" zc-json="myJson" zc-width=100%></div>
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
                        
                    </table>
                </div>
                <div class='text-right p-2'>
                    <h5>ยอดเงินเก็บทั่งหมด
                        <br> บาท</h5>
                </div>
            </div>

        </div>
        <div class='col-12 col-md-6 col-lg-8 '>
            <div class="p-3 bb">
                <div class='md-form text-right'>
                    <select class='form-control' ng-model="myJson2_S" ng-change='data_flow(myJson2_S)'>
                        <option value="3">เลือกรายการ</option>
                        <option value="0">รายรับ</option>
                        <option value="1">รายจ่าย</option>

                        <option value="2">เงินออม</option>

                    </select>
                </div>
                <div zingchart id="myChart" zc-json="myJson2" zc-width=100%></div>
            </div>



        </div>

    </div>
    
</div>