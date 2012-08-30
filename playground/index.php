<ul>
<?
function SomeFunction()
{
	global $name;
	return $name;
}

		$name = "Dan";

	for ($i=0; $i < 10; $i++): ?>
		<li><?= "Hello " . SomeFunction()?></li>
<?  endfor; ?>		
	
</ul>


