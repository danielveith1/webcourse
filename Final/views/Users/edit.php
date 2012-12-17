<?
require_once ('../../models/Users.php');

if(isset($_POST['userNumber']))
{
	
	
        $row = $_POST;
        $response = Users::Validate($row);
		
        if($response === true){
        	echo $row['userNumber'];  
                if($row['userNumber']==null){
                        $response = Users::Insert($row);
				echo "inserting";
				}                
                else				
                $response = Users::Update($row);
        if($response === true)
                header("Location: index.php?inserted=$row[userNumber]");
}
}
else{
	if(isset($_GET['id'])){
	        $row = Users::Get($_REQUEST['id']);
	
	}
	else {
			$row = Users::Blank();
		if($row['userNumber']==null)
		echo "id is null";
	}
}




?>


<!DOCTYPE html>
<html lang="en">
        <? include('../../inc/head.php'); ?>
        <body>
                <div>
                        <? include('../../inc/nav.php'); ?>

                        <div id="content">
                               
                                <? if(isset($response)): ?>
                                       <? 
                                       /* 
									    * this is html code commented out inside php tags
								        * it generates error codes above the form.
                                       <dl class="dl-horizontal error">
                                                <? foreach ($response as $key => $value) { ?>
                                                        <dt><?=$key?></dt>
                                                        <dd><?=$value?></dd>
                                              <? } ?>
									    </dl>
									    
									    * */               
                                                        ?>
                                        <? endif; ?>                                           
                                        
                                
                                <form class="form-horizontal" action="" method="post">
                                	
                                        <input type="hidden" name="userNumber" value="<?=$row['userNumber']?>" />
                                        <input type="hidden" name="userTypeNumber_FK" value="<?=$row['userTypeNumber_FK']?>" />
                                        <? function RenderInput($propertyName, $inputtype){ ?>
                                                <? global $row, $response; ?>
                                                <div class="control-group">
                                                        <label class="control-label" for="<?=$propertyName?>"><?=$propertyName?>:</label>
                                                        <div class="controls">
                                                                <input  type="<?=$inputtype?>" name="<?=$propertyName?>" id="<?=$propertyName?>" value="<?=$row[$propertyName]?>"
                                                                                class="<?=isset($response[$propertyName]) ? 'error' : '' ?>"
                                                                />
                                                                <? if(isset($response[$propertyName])): ?>
                                                                        <span class="error"><?=$response[$propertyName]?></span>
                                                                <? endif; ?>
                                                        </div>
                                                </div>
                                        <? } ?>
                                        <?
                                                RenderInput('firstName', 'text');
                                                RenderInput('lastName', 'text');
												RenderInput('addressLine1', 'text');
												RenderInput('addressLine2', 'text');
												RenderInput('city', 'text');
												RenderInput('state', 'text');
												RenderInput('zipcode', 'text');
												RenderInput('country', 'text');
                                                //RenderInput('userTypeNumber_FK', 'number')
                                        ?>
                                       
                                        <div class="control-group">
                                                <div class="controls">
                                                        <input type="submit" value="Save" class="btn btn-primary" />
                                                </div>
                                        </div>
                       
                                </form>

                        </div>
                        <? include('../../inc/footer.php'); ?>
                </div>
                <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
                <script type="text/javascript">
                        $(function(){
                               
                                $("form").validate(
                                        {
                                                rules: { created_at: { required: true} }
                                        }
                                );
                               
                                $("input[type='datetime']").datepicker();
                        });
                </script>
        </body>
</html>
