<?php
class RlB_TemplateFilter_splitmenu extends PerchTemplateFilter {
    public $returns_markup = false;
    public function filterBeforeProcessing($value, $valueIsMarkup = false) {
        $nPos = strpos($value,' | ');
        $output = $value;
        if (  $nPos != false )
        {  
            if ($this->Tag->filterpos == "second") {
                $output = substr($value, $nPos + 3);
            } else {
                $output = substr($value, 0, $nPos );
            }
        }
        return $output;
    }
}
PerchSystem::register_template_filter('splitmenu', 'RlB_TemplateFilter_splitmenu');
