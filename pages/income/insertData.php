
<?php
function isP($is){
    return isset($_POST[$is]);
}
function unP($un){
    unset($_POST[$un]);
}
$_SESSION['woring'] = null;
$_SESSION['success'] = null;
if(isset($_POST['save'])){
   
    if(isP('money') && isP('type') && isP('subtype') && isP('detail') ){

        $list = ['money' => $_POST['money'] , 'type' => $_POST['type'],'subtype'=>$_POST['subtype'],'detail' => $_POST['detail'],'idUser'=> json_decode($_SESSION['user'])->idUser];
        $insert = cmdDb("INSERT INTO incomeDB(moneyInput,typeMoney,detail,subType,userId) VALUE( '".$list['money']."' , '".$list['type']."' , '".$list['detail']."' , '".$list['subtype']."','".$list['idUser']."' )");
        if($insert) {
            $location = 'Location:'.$url.'&suc=เพิ่มรายการ "'.$list['type'].'" เรียนร้อยแล้ว ';
            $list = [];
            header($location);
            
        }else{
            $_SESSION['woring'] = 'เพิ่มรายผิดพลาด';
            unP('money');
            unP('type');
            unP('subType');
            unP('detail');
            unP('save');
            
        }
        
    }else{
        $_SESSION['woring'] = 'ใส่รายการให้ครบทุกกช่อง';        
    }

}else if(isset($_POST['clear'])){
    unP('money');
    unP('type');
    unP('subType');
    unP('detail');
    $list = [];
}

?>

<div class="col-12" style='margin:auto;margin-top:50px;'>
    <div class="row income_insert" style='background:white;box-shadow:0 0 10px 5px rgba(0,0,0,0.1)' ng-if='!type_ready'>
        <div class="col-12 col-md-5 income_b" >

            <div class="p-2">
                <a style='font-size:22px' ui-sref='home.insert'>
                    <i class="far fa-times-circle"></i>
                </a>
            </div>

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
                <?php echo  (isset($_SESSION['woring'])) ?  "<p class='err'> ".$_SESSION['woring']." </p>" : null ; ?>
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
                            <select class="form-control" name='type' >
                                <option  value=''>ระบุบประเภทของรายการ</option>
                                
                                <option  value='รายรับ'>รายรับ</option>
                                <option  value='รายรับ'>รายจ่าย</option>
                                <option  value='รายรับ'>รายเก็บ</option>
                                
                                
                            </select>

                            <label  for="ระบุบประเภทย่อยของรายการ">ระบุบประเภทย่อยของรายการ</label>
                            <select class="form-control" name='subtype'>
                                <option value="">ระบุบประเภทย่อยของรายการ</option>
                                <option  value='ทั่วไป'>ทั่วไป</option>
                            </select>
                            <small>* คุณสามารถเพิ่มชนิดย่อยได้โดยารคลิก >>> <a href="pages/adminpage/layout.php?pages=insertSubtype">เพิ่มประเภทย่อย</a></small>
                            <br>
                        </div>
                       
                    
                           
                        

                    </div>
                    <div class="form-group">
                                <label for="comment">รายละเอียดของรายการ :</label>
                                <input type="text" name='detail'  placeholder="ใส่รายละเอียดเพิ่มเติม" class="form-control">
                            </div>
                       
                    <div class="row">
                       <button type="submit" name='save' class='btn col-6 btn-danger'>
                            <i class="far fa-save"></i> SAVE</button>
                        <button type="submit" name='clear' class='btn col-6'>
                            <i class="far fa-save"></i> Clear</button>
                       </div>
                       
                </form>

            </div>
            <div class="p-3">

            </div>
        </div>
       

    </div>
    <!--<div class="row income_insert p-3 " style='background:white;box-shadow:0 0 10px 5px rgba(0,0,0,0.1)' ng-if='type_ready' >

        <div style='margin:auto;' class="col-12 text-center p-3">

            <h3 class='p-3'> กรุณาตั่งค่า ประเภทย่อย ที่คุณต้องการก่อนเพิ่มบัญชีรายรับรายจ่าย</h3>
        </div>
        <div style='margin:auto;' class="col-12 col-md-6">

                <form  style='margin:auto;' ng-submit="saveType()" name='myForm' novalidate>
                        <div class="md-form">
                            <label for="type">เลือกประเภทหลัก </label>
                            <select type="text" class="form-control" name='typeMoney' ng-model="type_subtype.typeMoney" required>
            
                                <option value="รายรับ">รายรับ</option>
                                <option value="รายจ่าย">รายจ่าย</option>
                                <option value="เงินออม">เงินออม</option>
                            </select>
                            <small> * ในส่วนของประเภทคือ รายรับ รายจ่าย เงินเก็บ </small>
            
                        </div>
                        <div class="md-form">
                            <label for="type">ประเภทย่อยที่ต้องการใส่  </label>
                            <input type="text" class="form-control" name='subtype' placeholder="ชนิดเพิ่มเติม * จำเป็นต้องใส่เป็นตัวอักษร" ng-model='type_subtype.subtype'
                                required>
                            <small> *จำเป็นต้องใส่เพื่อขยายในส่วนของประเภทหลักว่า เป็นรายการแบบไหน เช่น เป็นรายจ่าย ประเภทย่อยคือ อาหาร หรือ เป็นเครื่องดื่ม หรือ อื่นๆ</small>
                                
                        </div>
                        <div class="md-form p-2">
                            <button type='submit' ng-disabled="myForm.$invalid" class="btn btn-block  btn-danger">Save</button>
                           
                        </div>
          
            <p>หมายเหตุ : การตั่งต่าประเภทย่อยคือ สมมุติเราเลือกรายรับ เราสามารถกำหนดประเภทย่อยเป็น เงินเดือน หรืออื่นๆได้</p>
        </div>
    </div>-->

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