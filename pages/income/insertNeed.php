
<?php
if(isP('saveWanna')){
    if($_POST['wannaName'] != null && $_POST['wannaPrice'] != null){
        $selete_h_wanna = cmdDb('SELECT * FROM wanna WHERE userId='.$user->idUser.' AND nameWanna="'.$_POST['wannaName'].'" AND priceWanna='.$_POST['wannaPrice'].' ');
        if(num_I($selete_h_wanna) == 0){
            $insert_wanna = cmdDb("INSERT INTO wanna(nameWanna,priceWanna,userId) VALUES ('".$_POST['wannaName']."' , ".$_POST['wannaPrice']." ,".$user->idUser.") ");
            if($insert_wanna){
                echo "<script>
                    window.location = '/income/pages/adminpage/layout.php?pages=insertNeed&suc=เพิ่มรายการสำเร็จ'
                </script>";
            }else{
                echo "<script>
                window.location = '/income/pages/adminpage/layout.php?pages=insertNeed&err=เพิ่มรายการไม่สำเร็จ'
            </script>";
            }
        }else{
            echo "<script>
                window.location = '/income/pages/adminpage/layout.php?pages=insertNeed&err=รายการนี้มีในรายการของคุณแล้ว';
            </script>";
        }
        /**/
    }
}

?>
<div class="col-12" style='margin:auto;margin-top:30px;' >
    <div class="row " style='background:white;box-shadow:0 0 10px 5px rgba(0,0,0,0.1)'>

        <div class="col-12 col-md-6 " style='background:white;'>
                
        
            <div class="p-3 col-12 col-md-6 text-center  margin-center">
                <h1 class='colorFont'>สิ่งที่ต้องการ</h1>
            </div>
            <div class="form">
                <?php echo isset($_GET['suc']) ? "<p class='suc'>".$_GET['suc']."</p>" : null  ?>
                <?php echo isset($_GET['err']) ? "<p class='err'>".$_GET['err']."</p>" : null  ?>
                
                <form style='margin:auto' action='/income/pages/adminpage/layout.php?pages=insertNeed' method='POST' >
                    <div class="md-form ">
                        <label for="สิ่งของที่ต้องการ">สิ่งของที่ต้องการ : </label>
                        <input type="text" name='wannaName'
                        placeholder="สิ่งของที่ต้องการ" class="form-control" require>
                    </div>
                    <div class="md-form">
                        <label for="ราคาของสิ่งนี้">ราคาของสิ่งนี้ : </label>
                        <input type="text" name='wannaPrice' onkeypress='keyintdot()' placeholder="ราคาของสิ่งนี้" class="form-control" require>
                        <p id='woring' >* ใส่ได้เฉพาะตัวเลข</p>
                        
                    </div>
                    <div class="md-form p-2">
                        <button class="btn btn-block btn-lg btn-danger" name='saveWanna'  >บันทึกรายการ</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-6 wanna_B">
            <div class="p-3"></div>
            <div style='background:rgba(255,255,255,0.8)' class="p-3">
                <h3 style='color:rgb(255, 0, 0)'> เพิ่มบัญชี สิ่งของที่ต้องการ</h3>
                <small style='background:rgba(255,255,255,0.8)'> * ราคาของสิ่งนี้ ให้ใส่เป็นตัวเลข เพื่อไปทำการคำนวณว่า เช่น ต้องกการซื้อ macbook pro ราคา 43000 โดยประมาณ มีเงินเก็บอยู 200 ต้องหาเพิ่มเท่าไหร่ถึงจะได้ ระบบจะช่วยคำนวณในส่วนนี้ </small>
            </div>
        </div>
    </div>
    <div class="p-1">

    </div>
</div>
<script src="/income/public/javascript/check_input_value.js"></script>
