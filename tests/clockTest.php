<?php

use PHPUnit\Framework\TestCase;

function getClock($time)
{
    //$aTime = explode(":", $time);
    $time = new DateTime($time);
    $seconds = (int)$time->format("s");
    $secondOutput = (($seconds % 2 === 0) ? "O" : "Y");
    $hours = (int)$time->format("H");
    if($hours[1]==="0")
    {
        for($i = 0; $i<3; $i)
        {
            
        }
    }
    $firstHourOutput = (($hours % 2 === 0) ? "O" : "Y");
    $secondHourOutput = (($hours % 2 === 0) ? "O" : "Y");
    return <<<EOF
$secondOutput
OOOO
{$firstHour}OOO
OOOOOOOOOOOO
OOOO
EOF;
}

final class ClockTest extends TestCase 
{
  public function testZeroSecond(){
      $this->assertEquals(<<<EOF
O
OOOO
OOOO
OOOOOOOOOOOO
OOOO
EOF
, getClock("00:00:00"));
  }

    public function testOneSecond()
    {
        $this->assertEquals(<<<EOF
Y
OOOO
OOOO
OOOOOOOOOOOO
OOOO
EOF
,
            getClock("00:00:01")
        );
    }

    public function testOneHour()
    {
        $this->assertEquals(<<<EOF
O
OOOO
YOOO
OOOOOOOOOOOO
OOOO
EOF
, getClock("01:00:00")
        );
    }

    public function testTwoHours()
    {
        $this->assertEquals(<<<EOF
O
OOOO
YYOO
OOOOOOOOOOOO
OOOO
EOF
,            getClock("01:00:00")
        );
    }   
}
