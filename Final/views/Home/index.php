
<?
require_once ('../../models/Logins.php');
//RequireLogin();


if(isset($_POST['email']))
{
        $row = $_POST;
		
        if(Logins::CheckPassword($row) == TRUE) {
        	echo "yay you logged in";
        }
		else {
			echo "wrong email or password... boo.";
		}
}
else{
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
                                                RenderInput('email', 'text');
												RenderInput('password', 'text');
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
                
                
        </body>
</html>
<? } ?>