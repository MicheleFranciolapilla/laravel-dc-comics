<?php 

    trait   title_trait
    {
        private string  $original_title;
        private string  $title;

        private function clear_repeated_blanks()
        {
            $str = trim(preg_replace('/\s+/', ' ', $this->title));
            $this->title = $str;
        }

        private function casing_title()
        {
            $str = ucfirst(strtolower($this->title));
            $this->title = $str;
        }

        public  function format_title(string $_title) : string
        {
            $this->original_title = $_title;
            $this->title = $_title;
            $this->clear_repeated_blanks();
            $this->casing_title();
            return $this->title;
        }
    }

?>