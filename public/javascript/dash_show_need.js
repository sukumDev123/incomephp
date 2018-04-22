$(document).ready(function(){
    let {save} = num_i_s_o();
    let need_arr_fix  = need_arr.slice(0,5);
    need_arr_fix.forEach(ele => {
        let  { idWanna,nameWanna,priceWanna } = ele ;
        let price_s =  ( (priceWanna - save) > 0 ) ? money_two_l((priceWanna - save)) : "ซื้อได้แล้ว"  ;
        
        $('table').append('<tr><td>'+nameWanna+'</td><td>'+price_s+'</td><td><a style="color:red;" href="/income/pages/adminpage/layout.php?pages=dashboard&delete_wanna='+idWanna+'" >ลบ</a></td></tr>');
    })
    $('#saveP').text(money_two_l(save) );/** ทำให้เลขเป็น 00,000.00 */
})