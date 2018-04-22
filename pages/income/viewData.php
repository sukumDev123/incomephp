<?php

$select = cmdDb('SELECT * FROM incomeDB WHERE userid='.$user_f->idUser.' ');
$total = [];
$i = 0 ;
$getTypeUrl = isset($_GET['type']) ? $_GET['type'] : null;
$getShowOnPage = null;
if($getTypeUrl == 'all') $getShowOnPage = 'ดูทั่งหมด';
if($getTypeUrl == 'day') $getShowOnPage = 'ดูรายวัน';
if($getTypeUrl == 'month') $getShowOnPage = 'ดูรายเดือน';
if($getTypeUrl == 'year') $getShowOnPage = 'ดูรายวัน';

while($row = $select->fetch_array()){
    $total[$i] = [ 'money' => $row['moneyInput'] , 'type' => $row['typeMoney'] , 'detail' => $row['detail'] , 'subtype' => $row['subType'] , 'date_c' => $row['create_at'] , 'idIncome' => $row['incomeId']];
    $i++;
}
$json_a = json_encode($total);
if(isset($_GET['delete_income'])){
    
    $delete_income = cmdDb("DELETE FROM incomeDB WHERE userId=".$user_f->idUser." AND IncomeId=".$_GET['delete_income']." ");
    if($delete_income){
        echo "<script>
                alert('ลบรายการสำเร็จ');
                window.location = '/income/pages/adminpage/layout.php?pages=viewData&type=".$_GET['type']."';
            </script>";
    }else{
        echo "<script>
                alert('worring : ลบรายการไม่สำเร็จ ');
            </script>";
    }
    
}
?>
<script>
    let total = <?php echo $json_a ?>;
    let type_S = '<?php echo isset($_GET['type']) ? $_GET['type'] : null ?>';
    let show_total_page_shearch = 0;
    let array_type_use = []; // เก็บ ข้อมูลที่ ตรงกับ $_GET['type] จาก url
    let temp_total = [],temp_array = [] ,temp_i = 0 ; temp_o = 0 , temp_s = 0;
    let size_page_ = 10;
    if(type_S == ''){
        window.location = '/income/pages/adminpage/layout.php?pages=viewData&type=all';
    }
    function check_min_7(date) {
        let date_start = new Date("04 21 2018");;
        let date_end = new Date();
        var startA = Date.parse(date_start);
        var endA = Date.parse(date_end)
        var gg = endA - startA;
        var num_days = ((gg % 31536000000) % 2628000000) / 86400000; // day
        let res = 0;
        res = Math.round(num_days); // day
        return res;

    }
    function numMoney(money,type){
        if(type == 'รายรับ'){
            temp_i += parseInt(money);
        }else if(type =='รายจ่าย'){
            temp_o += parseInt(money);

        }else if(type == 'เงินออม'){
            temp_s += parseInt(money);

        }
    }//new Date().toISOString()
    function appendTable(ele){
        let display = ele.display ? ele.display : 'block';
        return "<tr> <td>"+money_two_l(parseInt(ele.money))+"</td> <td>"+ele.type+"</td> <td>"+ele.subtype+"</td> <td>"+ele.detail+"</td> <td>"+ele.date_c+"</td> <td> <a style='color:red;display:"+display+"' href='/income/pages/adminpage/layout.php?pages=viewData&type=all&delete_income="+ele.idIncome+" '>ลบ</a> </td> </tr>";
    }
    function nowShowDate(n , infor) {
            let data = infor
            let begin = (n - 1) * size_page_;
            let end = begin + size_page_;
            data = infor.slice(begin,end);

            return data
        }
    function page_size(){
        return  Math.ceil(array_type_use.length / size_page_);
    }
    function number_show(n) { /** page number */
        let num_input = page_size();
        let t = [];
        for (var i = 0; i < num_input; i++) {
            t.push(i + 1);
        }
        let tl = t.slice(0, 2)
        if (n >= tl.length) {
            tl = t.slice(n - 2, n + 1);
        }
        return tl;

        }
    function Date_setType(date_num){
        array_type_use = [];
        show_total_page_shearch = 0;
        if(type_S  == 'all' ){
            $('#show_data_type').hide();
            total.forEach(ele => {
       
                show_total_page_shearch++;
                array_type_use.push(ele);
            })
       }else if(type_S == 'day'){
            total.forEach(ele => {
                
                if(ele.date_c.split(' ')[0].slice(0,10) == date_num.slice(0,10)){
                    show_total_page_shearch++;
                    array_type_use.push(ele); 
                }
                   
            })
       }else if(type_S == 'month'){
            total.forEach(ele => {
                
                if(ele.date_c.split(' ')[0].slice(0,7) == date_num.slice(0,7) ){
                    show_total_page_shearch++;
                    array_type_use.push(ele);
                    
                }
                
                   
            })
            
       }else if(type_S == 'year'){
            total.forEach(ele => {
                if(ele.date_c.split(' ')[0].slice(0,3) == date_num.slice(0,3) ){
                    show_total_page_shearch++;
                    array_type_use.push(ele);
                    
                }
                
                   
            })
            
       }
       
           page_show_num_html(0,1,array_type_use);

     
    }
    function money_two_l(money){
        return money.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    }
    function show_of_type(type){
        let checkNum = 0;
        if(type != ""){
            array_type_use.forEach(ele => {
            if(type == ele.type){
                $("table tbody").append(appendTable(ele));
                checkNum++;
            }
            })
            if(checkNum == 0){
                alert('ไม่มีรายการ "' + type + '" ในระบบ');
            }
        }
        
       
    }
    function page_show_num_html(num_show,num_selete,array){
        let checkNum = array.length;
        if(checkNum !=0){
            let num_array_This = array.length;
            let page = number_show(num_show)// จำนวนเพจ  
            $("#page_selete_now_and_page_total").text(num_selete)
            page.forEach(ele => {
                $('#show_num_page ').append('<li class="page-item" id="numPage"><a class="page-link" onclick="onChangePage('+ele+')">'+ele+'</a></li>')
            })
        
            array.forEach(ele => {
                numMoney(ele.money,ele.type); /** รายรับ รายจ่าย เงิน ออม หาผมรวม */
            })
            nowShowDate(num_selete,array).forEach(ele => {
          
            $("table tbody").append(appendTable(ele));
            // หน้าเพจที่เลือกและข้อมูล
            })
            
        }else {
            temp_i = 0 ; temp_o = 0 , temp_s = 0;
        }

            total_list();
        

    
        
    }
    function onChangePage(ele){
        temp_i = 0 ; temp_o = 0 , temp_s = 0;
        
        $("table tbody tr").remove();
        $('#show_num_page #numPage').remove();
        
        page_show_num_html(ele,ele,array_type_use); 
        
    }
    function total_list(){
        $('#income_p').text("รายรับทั้งหมด : "+ money_two_l(temp_i) + " บาท")
        $('#out_p').text("รายจ่ายทั้งหมด : "+money_two_l(temp_o)+ " บาท")
        $('#save_p').text("เงินออมทั้งหมด : "+money_two_l(temp_s)+ " บาท")
    }
    $(document).ready(function(){
        let temp_mo_s  = 0;
        
        Date_setType(new Date().toISOString());
        
        
        $("#show_total_page_shearch").text(show_total_page_shearch);
        
        $('#dateSetChange_a').on('change', () => {
            
            $("table tbody tr").remove();
            $('#show_num_page #numPage').remove();
            Date_setType(new Date($('#dateSetChange_a').val()).toISOString());
            $("#show_total_page_shearch").text(show_total_page_shearch);           
            
            
        })
        $('#type_selete_list').on('change', () => {
            
            $("table tbody tr").remove();
            let this_s = $('#type_selete_list');
            show_of_type(this_s.val());
            
            
        })
        

    }); 
    //
                
        

</script>
<div class="container">
    <div class="row p-3 "  style='background:white;height:auto;margin-top:10px;'>
        <div class="col-12 col-md-4 ">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link"  id='bb' href='/income/pages/adminpage/layout.php?pages=viewData&type=all' >แสดงรายการทั้งหมด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id='bb' href='/income/pages/adminpage/layout.php?pages=viewData&type=day'>แสดงเฉพาะวันนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  id='bb' href='/income/pages/adminpage/layout.php?pages=viewData&type=month'>แสดงเฉพาะเดือนนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  id='bb' href='/income/pages/adminpage/layout.php?pages=viewData&type=year'>แสดงเฉพาะปีนี้</a>
                </li>
            </ul>
            <div class="p-3">
                <form>
                    <div class="md-form">
                        <label for="เลือกประเภทการแสดง">เลือกประเภทการแสดง</label>
                        <select id='type_selete_list'  class='form-control'>
                            <option value="">ระบุบสิ่งที่ต้องการแสดง </option>
                            <option value="รายรับ">รายรับ </option>
                            <option value="รายจ่าย">รายจ่าย </option>
                            <option value="เงินออม">เงินออม </option>

                        </select>
                    </div>
                </form>
            </div>
            <div class="p-3 " id='show_data_type'>
                <form >
                    <label for="เลือกวัน">เลือกวันที่ต้องการแสดง</label>
                    <input type="date"  id="dateSetChange_a" class='form-control'  >
                </form>
            </div>
            <div class="p-3" >
                <p id='income_p'></p>
                <p id='out_p'></p>
                <p id='save_p' ></p>

            </div>
        </div>
        <div class="col-12 col-md-8 ">
            <h5 class='text-center'>แสดงรายการแบบ : <?php echo $getShowOnPage ?> </h5>
            <label for="data" >ข้อมูลที่ค้นพบ : <label id='show_total_page_shearch'></label> </label>
            <br>
            <label  for="data"> Page :<label id='page_selete_now_and_page_total'></label>   </label>

            <div class="table-responsive">
                <table id='tableS' class="table" >
                  
                <thead>
                    <tr>
                        <th>จำนวนเงิน</th>
                        <th>ชนิด</th>
                        <th>ชนิดย่อย</th>
                        <th>รายละเอียด</th>
                        <th>วันที่</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>

                </table>
                
                <nav aria-label="Page navigation example" style='margin:0 auto;'>

                    <ul id='show_num_page' class="pagination" style='margin:0'>
                        <litable class="page-item">
                            <a class="page-link" ng-click="changePage(currentPage-1)">Previous</a>
                        </litable>

                        

                        <li class="page-item">
                            <a ng-click="changePage(currentPage+1)" class="page-link">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
            
        </div>
    </div>
</div>
<script>
        let href_now2 = window.location.href;
        let elms2 = document.querySelectorAll("[id='bb']");  
        for(let i = 0 ; i < elms2.length;i++){  
             if(elms2[i] == href_now2){
                $(elms2[i]).addClass('active');
            }
        }
</script>