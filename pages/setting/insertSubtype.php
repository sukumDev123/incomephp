<?php

if(isP('save_sub_type')){
    if($_POST['typeMoney'] != null && $_POST['subtype'] != null ){
        $type = $_POST['typeMoney'];
        $subType = $_POST['subtype'];
        $check_subTyoe = cmdDb("SELECT * FROM usbType WHERE userId=".$user->idUser." AND nameSub='".$subType."' AND Typeof='".$type."'  ");
        var_dump(num_I($check_subTyoe));
        if(num_I($check_subTyoe) > 0){
            echo "<script>
                window.location = '/income/pages/adminpage/layout.php?pages=insertSubtype&err=รายการนี้มีอยู่ในประเภทย่อยของท่านแล้ว ';
            </script>";
        }else{
            $insert_Sub = cmdDb("INSERT INTO usbType(Typeof,nameSub,userId) VALUES ('".$type."', '".$subType."' , ".$user->idUser." ) ");
            if( $insert_Sub){
                echo "<script>
                    window.location = '/income/pages/adminpage/layout.php?pages=insertSubtype&subType=เพิ่มรายการเรียบร้อย ';
                </script>";
            }else{
                echo "<script>
                    window.location = '/income/pages/adminpage/layout.php?pages=insertSubtype&err=ไม่สามารถเพิ่มรายการ ';
                </script>";
            }
        }


        
    }
}
if(isset($_GET['deleteSub'])){
    $delete_subType = cmdDb("DELETE FROM usbType WHERE userId=".$user->idUser." AND idSub=".$_GET['deleteSub']." ");
    if($delete_subType){
        echo "<script>
                window.location = '/income/pages/adminpage/layout.php?pages=insertSubtype&subType=ลบรายการสำเร็จ ';
            </script>";
    }else{
        echo "<script>
            window.location = '/income/pages/adminpage/layout.php?pages=insertSubtype&err=มีข้อผิดพลาดในการลบข้อมูล ';
        </script>";
    }
}

?>

<div class="container bb" style='padding:20px;margin-top:10px;' ng-controller="SettingType">



    <div class="col-12 col-md-6  p-3" style='margin:auto ; '>
        <?php echo isset($_GET['subType']) ? "<p class='suc'> ".$_GET['subType']." </p>" : null ?>
        <?php echo isset($_GET['err']) ? "<p class='err'> ".$_GET['err']." </p>" : null ?>
        
        <div class="text-center p-2">
        <h1 style="color:red">เพิ่มประเภทย่อย</h1>
            
        </div>
        <form  style='margin:auto;' action='/income/pages/adminpage/layout.php?pages=insertSubtype' method='POST'  name='myForm' >
            <div class="md-form">
                <label for="type">เลือกประเภทหลัก </label>
                <select type="text" class="form-control" name='typeMoney'  required>

                    <option value="รายรับ">รายรับ</option>
                    <option value="รายจ่าย">รายจ่าย</option>
                    <option value="เงินออม">เงินออม</option>
                </select>
                <small> * ในส่วนของประเภทคือ รายรับ รายจ่าย เงินเก็บ </small>

            </div>
            <div class="md-form">
                <label for="type">ประเภทย่อยที่ต้องการใส่  </label>
                <input type="text" class="form-control" name='subtype' placeholder="ชนิดเพิ่มเติม * จำเป็นต้องใส่เป็นตัวอักษร" 
                    required>
                <small> *จำเป็นต้องใส่เพื่อขยายในส่วนของประเภทหลักว่า เป็นรายการแบบไหน เช่น เป็นรายจ่าย ประเภทย่อยคือ อาหาร หรือ เป็นเครื่องดื่ม หรือ อื่นๆ</small>
                    
            </div>
            <div class="md-form p-2">
                <button type='submit' name='save_sub_type' class="btn btn-block  btn-danger">Save</button>
                
            </div>
        </form>
    </div>




    <!--//////////////////////////////////////php select data subType list/////////////////////////////////////////////////// -->

    <?php   
        $limitShow = isset($_GET['showmore']) ? $_GET['showmore'] : 5;
        $show_subType = cmdDb("SELECT * FROM usbType WHERE userId=".$user->idUser." order by timeCreate_at DESC LIMIT 0,".$limitShow." ");
        $check_num_type = num_I($show_subType);
    ?>



    <div class="col-12 p-3" style='margin:auto ; '>
        <small>* เป็นรายการ ประเภทย่อยที่มีอยู่แล้วโดยห้ามใส่รายการให้ ซ่ำกัน</small>
        <div class="table-responsive-sm">
            <table class="table">
                <tr>
                    <th>ประเภท</th>
                    <th>ประย่อย</th>
                    <th>ลบข้อมูล</th>
                </tr>
                <?php
                    if($check_num_type > 0){
                        while($row = $show_subType->fetch_array())
                        {
                ?>
                    <tr>
                        <td><?php echo $row['Typeof']; ?></td>
                        <td><?php echo $row['nameSub']; ?></td>        
                        <td><a href="/income/pages/adminpage/layout.php?pages=insertSubtype&deleteSub=<?php echo $row['idSub']; ?> "><i class='far fa-times-circle'></i></a></td>        
                                
                            
                    </tr>


                <?php
                        }
                    }
                
                ?>
            </table>
        </div>
        <button class="btn btn-block" onclick='ShowMore()' >แสดงเพิ่มเติม</button>
    </div>
</div>
<script>
function ShowMore(){
    let showData = <?php echo isset($_GET['showmore']) ? $_GET['showmore'] : 5 ?>;
    let total_data = <?php $show_subType_all = cmdDb("SELECT * FROM usbType WHERE userId=".$user->idUser." "); echo num_I($show_subType_all) ?>;
    let num_data_show_on = 0;
    if(showData < total_data){
        num_data_show_on = parseInt(showData) + 1;
        window.location ='/income/pages/adminpage/layout.php?pages=insertSubtype&showmore=' + num_data_show_on;     
    }else{
        alert("แสดงรายการครบแล้ว")
    }
  
}
</script>