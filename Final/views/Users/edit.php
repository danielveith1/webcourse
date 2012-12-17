<?
require_once ('../../models/Users.php');
require_once ('../../models/UserTypes.php');
if(isset($_POST['userNumber']))
{
	
	
        $row = $_POST;
        $response = Users::Validate($row);
		
        if($response === true){
        	  
                if($row['userNumber']==null){
                        	
                        $response = Users::Insert($row);
				
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
	}
	$types = UserTypes::GetAll();
}

?>

<? if(isset($_REQUEST['ajax'])): ?>
                                <form action="edit.php" method="post">
                                                <input type="hidden" name="userNumber" value="<?=$row['userNumber']?>" />
                                                                        <input  type="text" name="firstName" id="firstName" value="<?=$row['firstName']?>"
                                                                                        class="<?=isset($response['firstName']) ? 'error' : '' ?>"
                                                                        />
                                                                        <? if(isset($response['firstName'])): ?>
                                                                                <span class="error"><?=$response['firstName']?></span>
                                                                        <? endif; ?>
                                                                       
                                                                        <input  type="text" name="lastName" id="lastName" value="<?=$row['lastName']?>"
                                                                                        class="<?=isset($response['lastName']) ? 'error' : '' ?>"
                                                                        />
                                                                        <? if(isset($response['lastName'])): ?>
                                                                                <span class="error"><?=$response['lastName']?></span>
                                                                        <? endif; ?>
                                                                       
                                                                        <select name="userTypeNumber_FK" id="userTypeNumber_FK"
                                                                                        class="<?=isset($response['userTypeNumber_FK']) ? 'error' : '' ?>"
                                                                        >
                                                                                <? while ($krow = $types->fetch_assoc()): ?>                                                                        
                                                                                        <option
                                                                                                value="<?=$krow['userTypeNumber']?>"
                                                                                                <? if($row['userTypeNumber_FK'] == $krow['userTypeNumber']): ?>selected="selected"<? endif; ?>
                                                                                                >
                                                                                                <?=$krow['typeName']?>
                                                                                        </option>
                                                                                <? endwhile; ?>
                                                                        </select>
                                                                        <? if(isset($response['userTypeNumber_FK'])): ?>
                                                                                <span class="error"><?=$response['userTypeNumber_FK']?></span>
                                                                        <? endif; ?>
                                                                        <input type="submit" value="Save" class="btn btn-primary" />
                                        </form>

<? else: ?>
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
                                        
                                
                                <form class="form-horizontal" action="edit.php" method="post">
                                	
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
                                                 <label class="control-label" for="userTypeNumber_FK">userTypeNumber_FK:</label>
                                                 
                                                 <select name="userTypeNumber_FK" id="userTypeNumber_FK"
                                                                                        class="<?=isset($response['userTypeNumber_FK']) ? 'error' : '' ?>"
                                                                        >
                                                                                <? while ($krow = $keywords->fetch_assoc()): ?>                                                                        
                                                                                        <option
                                                                                                value="<?=$krow['userTypeNumber']?>"
                                                                                                <? if($row['userTypeNumber_FK'] == $krow['userTypeNumber']): ?>selected="selected"<? endif; ?>
                                                                                                >
                                                                                                <?=$krow['typeName']?>
                                                                                        </option>
                                                                                <? endwhile; ?>
                                                                        </select>
                                                                       
                                                                       
                                                                       
                                                                        <? if(isset($response['userTypeNumber_FK'])): ?>
                                                                                <span class="error"><?=$response['userTypeNumber_FK']?></span>
                                                                        <? endif; ?>
                                                                </div>
                                                        </div>
       
                                               
                                               
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
