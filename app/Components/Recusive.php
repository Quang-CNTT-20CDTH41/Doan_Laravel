<?php

namespace App\Components;

class Recusive
{
    private $data;
    private $htmlSelect;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function Recusive($parent_id, $id = 0, $text = '')
    {
        foreach ($this->data as $category) {
            if ($category->parent_id == $id) {
                if ($parent_id == $category->id)
                    $this->htmlSelect .= '<option selected value="' . $category->id . '">' . $text . $category->name . '</option>';
                else {
                    $this->htmlSelect .= '<option value="' . $category->id . '">' . $text . $category->name . '</option>';
                }
                $this->recusive($parent_id, $category->id, $text . '--');
            }
        }
        return $this->htmlSelect;
    }
}
