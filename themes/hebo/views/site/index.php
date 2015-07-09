<?php
// draws big calendar
echo '<h2>' . date('F Y', gettimeofday(true)) . '</h2>';
$today = getdate();
echo $this->drawCalendar($today['mon'], $today['year']);
//echo $this->drawCalendar(5, $today['year']);
?>

<h3 class="header">Our developers
    <span class="header-line"></span>  
</h3>
<div class="row-fluid center customers">
    <div class="span3 ">
        <div class="programmer">Silalahi
            <br><div style="font-size: 15px;">Sanny Permatasari<div style="font-size: 10px;">Analyst</div></div></div>
    </div>
    <div class="span3">
        <div class="programmer">Simanjuntak
            <br><div style="font-size: 15px;">Sitta Endah Pricilia<div style="font-size: 10px;">Programmer, Tester</div></div></div>
    </div>
    <div class="span3">
        <div class="programmer">Panggabean
            <br><div style="font-size: 15px;">Yohannes Sakti<div style="font-size: 10px;">Programmer, Tester</div></div></div>
    </div>
    <div class="span3">
        <div class="programmer">Silalahi
            <br><div style="font-size: 15px;">Olvi Lora<div style="font-size: 10px;">Team Leader, Designer</div></div></div>
    </div>

</div><!--/row-fluid-->