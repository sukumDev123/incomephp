<?php

$select = cmdDb('SELECT * FROM incomeDB WHERE userid='.$user_f->idUser.' ');
$total = [];
$i = 0 ;
while($row = $select->fetch_array()){
    $total[$i] = [ 'money' => $row['moneyInput'] , 'type' => $row['typeMoney'] , 'subtype' => $row['subType'] , 'date_c' => $row['create_at'] ];
    $i++;
}
$json_a = json_encode($total);
?>
<script>

    let total = <?php echo $json_a ?>;
    let type_S = '<?php echo isset($_GET['type']) ? $_GET['type'] : null ?>';
    if(type_S == ''){
        window.location = '/income/pages/adminpage/layout.php?pages=viewData&type=all';
    }

    


</script>
<div class="container">
    <div class="row p-3" style='background:white;height:auto;'>
        <div class="col-12 col-md-4 ">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link"  id='bb' href='/income/pages/adminpage/layout.php?pages=viewData&type=all' >แสดงรายการทั้งหมด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id='bb' href='/income/pages/adminpage/layout.php?pages=viewData&type=day'>แสดงเฉพาะวันนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  id='bb' href='/income/pages/adminpage/layout.php?pages=viewData&type=mouth'>แสดงเฉพาะเดือนนี้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  id='bb' href='/income/pages/adminpage/layout.php?pages=viewData&type=year'>แสดงเฉพาะปีนี้</a>
                </li>
            </ul>
            <div class="p-3" ng-if='showType'>
                <form>
                    <div class="md-form">
                        <label for="เลือกประเภทการแสดง">เลือกประเภทการแสดง</label>
                        <select  class='form-control'>
                            <option value="">ระบุบสิ่งที่ต้องการแสดง </option>
                            <option value="0">รายรับ </option>
                            <option value="1">รายจ่าย </option>
                            <option value="2">เงินออม </option>

                        </select>
                    </div>
                </form>
            </div>
            <div class="p-3">
                <form >
                    <label for="เลือกวัน">เลือกวันที่ต้องการแสดง</label>
                    <input type="date" class='form-control' ng-model="day_show" ng-change='day_show_function()'>
                </form>
            </div>
            <div class="p-3" >
                <p>รายรับ :  บาท</p>
                <p>รายจ่าย : บาท</p>
                <p>เงินออม :  บาท</p>

            </div>
        </div>
        <div class="col-12 col-md-8 ">
            <h5 class='text-center'>แสดงรายการแบบ :</h5>
            <label for="data">ข้อมูลที่ค้นพบ : </label>
            <br>
            <label  for="data"> Page :  </label>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>ประเภท</th>
                        <th>ประเภทย่อย</th>
                        <th>รายละเอียด</th>
                        <th>จำนวนเงิน</th>
                        <th>วันที่บันทึก</th>
                        <th>ลบ</th>
                    </tr>
                    
                </table>
                <nav aria-label="Page navigation example" style='margin:0 auto;'>

                    <!--<ul class="pagination" style='margin:0'>
                        <li class="page-item">
                            <a class="page-link" ng-click="changePage(currentPage-1)">Previous</a>
                        </li>

                        <li class="page-item" ng-repeat="n in tl">
                            <a ng-click="changePage(n)" class="page-link">{{n}}</a>
                        </li>

                        <li class="page-item">
                            <a ng-click="changePage(currentPage+1)" class="page-link">Next</a>
                        </li>
                    </ul>0-->
                </nav>
            </div>
        </div>
    </div>
</div>
<script>
        let href_now2 = window.location.href;
        
        var elms2 = document.querySelectorAll("[id='bb']");  
        for(let i = 0 ; i < elms2.length;i++){  
             if(elms2[i] == href_now2){
                $(elms2[i]).addClass('active');
            }
        }
</script>