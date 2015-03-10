<?php namespace Sukohi\Postern;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\HTML;

class Postern {

    private $_form_name = '';
    private $_link_data = [];
    private $_local_only = true;

    public function form($name) {

        $this->_form_name = $name;
        return $this;

    }

    public function credentials($label, $credentials) {

        $this->_link_data[] = [
            'label' => $label,
            'credentials' => $credentials
        ];
        return $this;

    }

    public function render($delimiter = '&nbsp;|&nbsp;') {

        if(App::isLocal() || !$this->_local_only) {

            $credential_links = [];

            foreach ($this->_link_data as $link_values) {

                $label = $link_values['label'];
                $js_code = $this->js_code($link_values['credentials']);
                $credential_links[] = '<a href="#" onclick="'. $js_code .'">'. $label .'</a>';

            }

            return implode($delimiter, $credential_links);

        }

        return '';

    }

    public function localOnly($boolean = true) {

        $this->_local_only = $boolean;
        return $this;

    }

    private function js_code($credentials) {

        $value_code = '';
        $keys = array_keys($credentials);

        foreach ($keys as $key) {

            $value_code .= '$(\'input[name='. $key .']\').val(\''. $credentials[$key] .'\');';

        }

        return $value_code .'$(\'form[name='. $this->_form_name .']\').closest(\'form\').submit();';

    }

}