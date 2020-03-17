<?php

class Template {

    private $nazev = '';
    private $data = [];

    public function Construct(string $nazev, array $data = []) {
        $this->setnazev($nazev);
        $this->setData($data);
    }

    public static function reate(string $nazev, array $data = []): Template {
        return new Template($nazev, $data);
    }

    public function Setnazev(string $nazev): Template {
        $this->nazev = $nazev;
        return $this;
    }

    public function GetData(string $nazev) {
        if (isset($this->data[$nazev])) {
            return $this->data[$nazev];
        } else {
            return null;
        }
    }

    public function SetData(array $data): Template {
        if (is_array($data) && !empty($data)) {
            $this->data = $data;
        }
        return $this;
    }

    public function AddData(string $nazev, $value): Template {
        if ($value instanceof Template) {
            $value = strval($value);
        }
        if (!empty($nazev) && !empty($value)) {
            if (isset($this->data[$nazev])) {
                $this->data[$nazev] .= $value;
            } else {
                $this->data[$nazev] = $value;
            }
        }
        return $this;
    }

    public function ClearData(): Template {
        $this->data = [];
        return $this;
    }

    public function Render(string $tagBeginEndSymbols = "{}"): string {
        $templateContent = $this->getFileContent();
        $str = '';
        if (!empty($templateContent)) {
            if (strlen($tagBeginEndSymbols) != 2) {
                return $templateContent;
            }
            $layoutArray = Str::toArray($templateContent);
            $VstupniData = false;
            $tag = '';
            foreach ($layoutArray as $char) {
                switch ($char) {
                    case $tagBeginEndSymbols[0]:
                        $VstupniData = true;
                        $tag = '';
                        break;
                    case $tagBeginEndSymbols[1]:
                        if (!empty($this->data[$tag])) {
                            $str .= $this->data[$tag];
                        }
                        $VstupniData = false;
                        $tag = '';
                        break;
                    default:
                        if ($VstupniData) {
                            $tag .= $char;
                        } else {
                            $str .= $char;
                        }
                        break;
                }
            }
        }
        return $str;
    }

    public function toString() {
        return $this->render();
    }

    private function GetContent() {
        if (!empty($this->nazev) && file_exists('views/' . $this->nazev . '.phtml')) {
            return file_get_contents('views/' . $this->nazev . '.phtml');
        }
        return false;
    }

}
