<?php

class Password {
    private $SYMS = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "+", "=", "?", "[", "]", "{", "}");
    
    private $size = null;
    private $keyword = null;
    private $checkbox = null;
    private $numbers = false;
    private $symbols = false;
    private $caps = false;
    private $password = "";
    
    public function __construct($checkBox, $keyword, $passSize) {
        $this->size = $passSize;
        $this->keyword = $keyword;
        $this->checkbox = $checkBox;
        $this->extractChecks();
        
        //echo "Size: " . $this->size . " Keyword: " . $this->keyword . " ";
        //echo ($this->numbers ? "numbers " : "") . ($this->symbols ? "symbols " : "") . ($this->caps ? "caps" : "");
    }
    

    
    private function extractChecks() {
        foreach ($this->checkbox as $check) {
            if ($check == "numbers") {
                $this->numbers = true;
            } else if ($check == "symbols") {
                $this->symbols = true;
            } else if ($check == "caps") {
                $this->caps = true;
            }
        }
    }
    
    private function getRandomChar() {
        $c = ($this->caps ? 1 : 0);
        $res = "";
        
        if ($c) {
            $type = rand(0, 1);
            if ($type) {
                $res = chr(ord('A') + rand(0, 25));
            } else {
                $res = chr(ord('a') + rand(0, 25));
            }
        } else {
            $res = chr(ord('a') + rand(0, 25));
        }
        
        
        return $res;
    }
    
    private function getRandomSymb() {
        $res = $this->SYMS[rand(0, count($this->SYMS) - 1)];
        return $res;
    }
    
    private function getRandomNum() {
        return rand(0, 9);
    }
    
    public function generatePassword() {
        $this->password .= $this->keyword;
        
        $len = strlen($this->password);
        while (true) {
            $len = strlen($this->password);
            if ($this->numbers && $len + 1 <= $this->size) {
                $this->password .= $this->getRandomNum();
                $len++;
            } else {
                if ($len + 1 > $this->size)
                    break;
            }
            
            if ($this->symbols && $len + 1 <= $this->size) {
                $this->password .= $this->getRandomSymb();
                $len++;
            } else {
                if ($len + 1 > $this->size)
                    break;
            }
            
            if ($this->caps && $len + 1 <= $this->size)  {
                $this->password .= $this->getRandomChar();
                $len++;
            } else {
                if ($len + 1 > $this->size) {
                    break;
                } else {
                    $this->password .= $this->getRandomChar();
                    $len++;
                }
            }
        }
        
        return $this->password;
    }
    
    
}

?>