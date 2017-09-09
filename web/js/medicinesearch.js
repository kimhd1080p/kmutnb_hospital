/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#medicinesearch").change(function(){
    
    var medicine=$(this).val();
    //alert(medicine);
    
    $.get("<?php echo Yii::$app->request->baseUrl. '/casemedicine/getmedicine' ?>/",{m :medicine },function(data){
            alert(data);

    });

});