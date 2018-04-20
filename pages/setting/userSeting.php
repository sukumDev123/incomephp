<?php

if(isP('update'))
{
    if(isP('first') && isP('last')){
       $update_ = ['name'=> $_POST['first'],'last' => $_POST['last'] , 'full' => ($_POST['first'].' '. $_POST['last']) ];
       $value_B = cmdDb("UPDATE userIncome SET fristName='".$update_['name']."',lastName='".$update_['last']."' , displayName='".$update_['full']."' WHERE userId='".$user->idUser."' "); 
       if($value_B){
            $selete_user = cmdDb("SELECT * FROM userIncome WHERE userId='".$user->idUser."' ");
            $row = $selete_user->fetch_array() ;
            $_SESSION['user'] = json_encode(
            [
            'idUser' => $row['userId'],
            'firstName' => $row['fristName'],
            'lastName' => $row['lastName'],
            'displayName' => $row['displayName'],
            'username' => $row['username'],
            "roles" => $row['roles'],
            "create_at" => $row['create_at']        
            ]
            );
            $user = json_decode($_SESSION['user']);
            
            echo "<script>
               
                window.location = '".$url."&update=อัปเคตชื่อและนามสกุลเรียบร้อย '
            </script>";
       }else{
           echo "not u";
       }
    }
}else if(isP('updatePassword')){
    if(isP('passwordold')&& isP('passwordnew')&& isP('passwordnew2')){
        $check = cmdDb("SELECT * FROM userIncome WHERE userId= ".$user->idUser." AND password=".$_POST['passwordold']." ");
        $check_num = num_I($check);
        if($check_num == 1){
            if( ($_POST['passwordnew'] == $_POST['passwordnew2']) && ( ($_POST['passwordnew'] !=null ) && ($_POST['passwordnew2']) ) ){
                $update_passW = cmdDb("UPDATE userIncome SET password='".$_POST['passwordnew']."' WHERE  userId= ".$user->idUser." ");
                if($update_passW){
                    echo "<script>
               
                        window.location = '/income/pages/adminpage/layout.php?pages=userSeting&update=อัปเคต Password เรียบร้อย '
                    </script>";
                }else{
                    echo "<script>
               
                        window.location = '/income/pages/adminpage/layout.php?pages=userSeting&err=อัปเคต Password ไม่เรียบร้อย '
                    </script>";
                }
            }else{
                echo "<script>
                
                window.location = '/income/pages/adminpage/layout.php?pages=userSeting&err=ระบุบ password ใหม่ให้เหมือกัน '
            </script>";
            }
        }else{
            echo "<script>
                window.location = '/income/pages/adminpage/layout.php?pages=userSeting&err=Passwordไม่ถูกต้อง '
            </script>";
        }
    }
}

?>

<div class="container " style='padding:10px;'>
    <div class="row">
           

        <div class="col-12 bb p-3" style="margin:0 auto;">
        <?php  echo isset($_GET['update']) ?  "<p class='suc'>'".$_GET['update']."'  </p>" : null ; ?>
        <?php  echo isset($_GET['err']) ?  "<p class='err'>'".$_GET['err']."'  </p>" : null ; ?>
        
            <div class="col-12 text-center">
                <h1 style='color:red'>
                     ข้อมูลส่วนตัว</h1>
            </div>
            <div class="row">
            <form class='col-6' method='post' action='<?php echo $url ?>' >
               
               <div class="col-12">
                   <div class="md-form">
                       <label for="name">ชื่อ :</label>
                       <input type="text" name="first" value='<?php echo $user->firstName; ?>' class="form-control" required>
                   </div>
                   <div class="md-form">
                       <label for="last">นามสกุล : </label>
                       <input type="text" name="last" value='<?php echo $user->lastName; ?>' class="form-control" required>
                   </div>
                   
               </div>
              
          
           <div class="md-form p-3">
               <button type="submit"  name='update' class="btn btn-block btn-danger">Update</button>
           </div>
          
       </form>
       <form class='col-6' action="<?php echo $url ?>" method='post'>
               <div class="md-form">
                   <label for="last">ใส่พาสเวิร์ดอันเก่า : </label>
                       
                   <input type="password" class='form-control' name='passwordold' placeholder='ใส่พาสเวิร์ดอันเก่า'>
               </div>
               <div class="md-form">
                   <label for="last">ใส่พาสเวิร์ดใหม่ : </label> 
                   <input type="password" class='form-control' name='passwordnew' placeholder='ใส่พาสเวิร์ดใหม่'>
               </div>
               <div class="mdd-form">
                   <label for="last">ใส่พาสเวิร์ดใหม่ อีกครั่ง : </label> 
                   
                   <input type="password" class='form-control' name='passwordnew2' placeholder='ใส่พาสเวิร์ดใหม่ อีกครั่ง'>
               </div>
               <div class="md-form p-3">
               <button type="submit" name='updatePassword' class="btn btn-block btn-primary">บันทึก</button>
           </div>
       </form>
            </div>
        </div>
    </div>
</div>