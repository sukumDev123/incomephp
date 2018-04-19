<?php
$userS = [ 'name' => $user->firstName , 'last' => $user->lastName];

if(isP('update'))
{
    if(isP('first') && isP('last')){
       $update_ = ['name'=> $_POST['first'],'last' => $_POST['last'] , 'full' => ($_POST['first'].' '. $_POST['last']) ];
       $value_B = cmdDb("UPDATE userIncome SET firstName='".$update_['name']."',lastName='".$update_['last']."' , displayName='".$update_['full']."' WHERE userId='".$user->idUser."' "); 
       
    }
}else if(isP('updatePassword')){

}

?>

<div class="container " style='padding:10px;'>
    <div class="row">
           

        <div class="col-12 bb p-3" style="margin:0 auto;">
            <div class="col-12 text-center">
                <h1 style='color:red'>
                     ข้อมูลส่วนตัว</h1>
            </div>
            <div class="row">
            <form class='col-6' method='post' action='<?php echo $url ?>' name="SaveUpdate" >
               
               <div class="col-12">
                   <div class="md-form">
                       <label for="name">ชื่อ :</label>
                       <input type="text" name="first" value='<?php echo $userS['name']; ?>' class="form-control" required>
                   </div>
                   <div class="md-form">
                       <label for="last">นามสกุล : </label>
                       <input type="text" name="last" value='<?php echo $userS['last']; ?>' class="form-control" required>
                   </div>
                   
               </div>
              
          
           <div class="md-form p-3">
               <button type="submit"  method='post' action='<?php echo $url ?>' name='update' class="btn btn-block btn-danger">Update</button>
           </div>
          
       </form>
       <form class='col-6' action="<?php echo $url ?>" method='post'>
               <div class="md-form">
                   <label for="last">ใส่พาสเวิร์ดอันเก่า : </label>
                       
                   <input type="password" class='form-control' name='passwordold' placeholder='ใส่พาสเวิร์ดอันเก่า'>
               </div>
               <div class="md-form">
                   <label for="last">ใส่พาสเวิร์ดใหม่ : </label> 
                   <input type="password" class='form-control' name='passwordold' placeholder='ใส่พาสเวิร์ดใหม่'>
               </div>
               <div class="mdd-form">
                   <label for="last">ใส่พาสเวิร์ดใหม่ อีกครั่ง : </label> 
                   
                   <input type="password" class='form-control' name='passwordold' placeholder='ใส่พาสเวิร์ดใหม่ อีกครั่ง'>
               </div>
               <div class="md-form p-3">
               <button type="submit" name='updatePassword' class="btn btn-block btn-primary">บันทึก</button>
           </div>
       </form>
            </div>
        </div>
    </div>
</div>