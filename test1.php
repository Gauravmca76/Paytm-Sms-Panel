<?php
    $row = 1;
    if (($handle = fopen("alpha.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            //echo "<p> $num fields in line $row: <br /></p>\n";
            if($row == 1)
            {
                for ($c=0; $c < $num; $c++) 
                {
                    echo $data[$c] . "<br />\n";
                }
            }
else
{
for ($c=1; $c < $num; $c++) 
{
echo 'Get a LOAN of upto Rs 500000 in JUST 4 minutes!

NO Collateral
NO BANK VISITs
NO Paperwork
Check your approved limit: '.$data[$c].' -SmartCash';echo'<br/>';
$c+=1;
}
}
            $row++;
        }
        fclose($handle);
    }
?>