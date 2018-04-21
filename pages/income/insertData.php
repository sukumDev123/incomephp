
<?php

if(isset($_POST['save'])){
   
    if( (isP('money') && isP('type') && isP('subtype') && isP('detail') ) && ( $_POST['money'] != null &&  $_POST['type'] != null &&  $_POST['subtype'] != null &&  $_POST['detail'] != null ) ){
        $date_s = date("Y-m-d H:i:s");
        echo $date_s;
        $list = ['money' => $_POST['money'] , 'type' => $_POST['type'],'subtype'=>$_POST['subtype'],'detail' => $_POST['detail'],'idUser'=> json_decode($_SESSION['user'])->idUser];
        $insert = cmdDb("INSERT INTO incomeDB(moneyInput,typeMoney,detail,subType,userId) VALUE( '".$list['money']."' , '".$list['type']."' , '".$list['detail']."' , '".$list['subtype']."','".$list['idUser']."')");
        if($insert) {
            echo "
            <script>
                window.location = '/income/pages/adminpage/layout.php?pages=insertData&suc=เพิ่มรายการสำเร็จ';
            </script>
            ";
            
        }else{
            echo "
            <script>
                window.location = '/income/pages/adminpage/layout.php?pages=insertData&woring=เพิ่มรายการไม่สำเร็จ';
            </script>
            ";
            
        }
        
    }else{
        echo "
        <script>
            window.location = '/income/pages/adminpage/layout.php?pages=insertData&woring=รายการไม่ครบทุกช่อง';
        </script>
        ";        
    }

}else if(isset($_POST['clear'])){
    unP('money');
    unP('type');
    unP('subType');
    unP('detail');
    $list = [];
}
$selete_subType = cmdDb("SELECT * FROM usbType WHERE userId=".$user->idUser." ");
$num_Subtype_insert = num_I($selete_subType);
$array_total_s = [];
$i = 0;

while($row = $selete_subType->fetch_array()){
    $array_total_s[$i] = ["type" => $row['Typeof'] , 'subType' => $row['nameSub'],'id' => $row['idSub'] ];
    $i++;    
}

?>
<script>
    let subType = <?php echo json_encode($array_total_s) ?>;
    let subType_selete = [];
    //$('#showSetDate').hide();
    
    function needSetDate(){
        $('#showSetDate').show();
    }
    function OnChagne(){
        let type = document.getElementById('type_s').value;
        subType_selete = [];
        subType.forEach((ele,i) => {
            if(ele.type == type){
                subType_selete.push(ele.subType);
            }
        })
        if(type != ""){
             $("#subtype > option").remove();  
            
            $('.sub_show').show();
            $("#subtype").append("<option>ทั่วไป</option>");
            subType_selete.forEach(ele => {
                $("#subtype").append("<option>"+ele+"</option>");
             })
        }else{
            $('.sub_show').hide();  
        }
    }
    
</script> 
<div class="col-12" style='margin:auto;margin-top:50px;'>
    <div class="row income_insert" style='background:white;box-shadow:0 0 10px 5px rgba(0,0,0,0.1)' ng-if='!type_ready'>
        <div class="col-12 col-md-5 income_b" >
<div class="p-2"></div>

            <div class="p-2" style='background:rgba(255,255,255,0.8)'>
                <h3 style='color:rgb(255, 0, 0)'> เพิ่มบัญชี รายรับรายจ่าย</h3>
                <small  class='text-muted'>* ใส่จำนวนเงินที่ต้องการ ใส่เฉพาะตัวเลข
                    <br> * ระบุบประเภทของรายการ และให้ระบุบเป็น รายรับ รายจ่าย หรือเป็นเงินออม
                    <br> * เมื่อระบุบประเภทแล้ว จะมีการแสดงประเภทย่อย โดยจะต้องไประบุบประเภทย่อยก่อน โดยประเภทย่อยใช้แสดง เช่น
                    รายจ่าย จ่าย อาหาร หรือ รายจ่าย จ่าย สินค้าในครัวเรือน เป็นต้น โดยสามารถ คลิดที่ >>
                    <a ui-sref='setting.type'
                        style='color:rgb(0, 119, 255)'> เพิ่มประเภทย่อย </a>
                </small>

            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="p-3 col-12  text-center  margin-center">
                <h1 class='colorFont'>รายรับ รายจ่าย</h1>
            </div>
            <div class="col-12 ">
                <?php echo  (isset($_GET['woring'])) ?  "<p class='err'> ".$_GET['woring']." </p>" : null ; ?>
                <?php echo (isset($_GET['suc'])) ?  "<p class='suc'> ".$_GET['suc']." </p>" : null ; ?>
                <form action='<?php echo $e_url; ?>' method='POST' class='col-12'>
                    <div class="row" style='margin:0 auto;' ng-if='!skipp'>
                        <div class="col-12 ">

                            <div class="md-form">
                                <label for="">ใส่จำนวนเงินที่ต้องการ</label>
                                <input type="text" onkeypress='keyintdot()' name='money' placeholder="0.00 บาท" class="form-control">
                            </div>
                            <p id='woring' >* ใส่ได้เฉพาะตัวเลข</p>
                        </div>

                        <div class="col-12 ">
                            <label for="ระบุบประเภทของรายการ">ระบุบประเภทของรายการ</label>
                            <select class="form-control" name='type' id='type_s' onchange='OnChagne()' >
                                <option  value=''>ระบุบประเภทของรายการ</option>
                                
                                <option  value='รายรับ'>รายรับ</option>
                                <option  value='รายจ่าย'>รายจ่าย</option>
                                <option  value='เงินออม'>เงินออม</option>
                                
                                
                            </select>

                            <div class="sub_show">
                                <label  for="ระบุบประเภทย่อยของรายการ">ระบุบประเภทย่อยของรายการ</label>
                                <select class="form-control" name='subtype' id='subtype'>
                                    <option value="">ระบุบประเภทย่อยของรายการ</option>
                                    <option  value='ทั่วไป'>ทั่วไป</option>
                    
                                </select>
                                <small>* คุณสามารถเพิ่มชนิดย่อยได้โดยารคลิก >>> <a href="pages/adminpage/layout.php?pages=insertSubtype">เพิ่มประเภทย่อย</a></small>
                            </div>
                            <br>
                        </div>
                       
                    
                           
                        

                    </div>
                    <!--<div class='form-group'>
                        <input type="checkbok" onclick='' >
                    </div>-->
                    <div class="form-group">
                                <label for="comment">รายละเอียดของรายการ :</label>
                                <input type="text" name='detail'  placeholder="ใส่รายละเอียดเพิ่มเติม" class="form-control">
                            </div>
                       
                    <div class="row">
                       <button type="submit" name='save' class='btn  col-6 btn-danger'>
                            <i class="far fa-save"></i> SAVE</button>
                        <button type="submit" name='clear' class='btn col-6'>
                            Clear</button>
                       </div>
                       
                </form>

            </div>
            <div class="p-3">

            </div>
        </div>
       

    </div>
    <div class="p-1"></div>

</div>
<script>
        document.getElementById('woring').style.display = 'none';
        function keyintdot() {
        var key = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
        if ((key<46 || key>57 || key == 47) && (key != 13)) {
            event.returnValue = false;
            document.getElementById('woring').style.display = 'block';
            document.getElementById('woring').style.color = 'red';
            
            
            
        }else{
            document.getElementById('woring').style.display = 'none';
            
        }
       
        
    }
</script>
