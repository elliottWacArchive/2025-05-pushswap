<?php

class PushSwap
{
    private $la;
    private $lb;
    public function __construct(&$la = [], &$lb = [])
    {
        $this->la = &$la;
        $this->lb = &$lb;
    }
    public function sa()
    {
        if (count($this->la) < 2) {
            return;
        }
        $temp = $this->la[0];
        $this->la[0] = $this->la[1];
        $this->la[1] = $temp;
    }
    public function sb()
    {
        if (count($this->lb) < 2) {
            return;
        }
        $temp = $this->lb[0];
        $this->lb[0] = $this->lb[1];
        $this->lb[1] = $temp;
    }

    public function sc()
    {
        $this->sa();
        $this->sb();
    }
    public function pa()
    {
        if (empty($this->lb)) {
            return;
        }
        array_unshift($this->la, array_shift($this->lb));
    }
    public function pb()
    {
        if (empty($this->la)) {
            return;
        }
        array_unshift($this->lb, array_shift($this->la));
    }
    public function ra()
    {
        if (empty($this->la)) {
            return;
        }
        $temp = array_shift($this->la);
        array_push($this->la, $temp);
    }
    public function rb()
    {
        if (empty($this->lb)) {
            return;
        }
        $temp = array_shift($this->lb);
        array_push($this->lb, $temp);
    }
    public function rr()
    {
        $this->ra();
        $this->rb();
    }
    public function rra()
    {
        if (empty($this->la)) {
            return;
        }
        $temp = array_pop($this->la);
        array_unshift($this->la, $temp);
    }
    public function rrb()
    {
        if (empty($this->lb)) {
            return;
        }
        $temp = array_pop($this->lb);
        array_unshift($this->lb, $temp);
    }
    public function rrr()
    {
        $this->rra();
        $this->rrb();
    }
}
