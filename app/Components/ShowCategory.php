<?php

namespace App\Components;

class ShowCategory
{
    private $htmlCategory;
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function show($id = 0)
    {
        foreach ($this->data as $value) {
            if ($value->parent_id == $id && $value->status != 0) {
                $this->htmlCategory .= '<li data-filter=".' . str_slug($value->name) . '">';
                $this->htmlCategory .= '<a>' . $value->name . '</a>';
                $this->htmlCategory .= '<ul class="sub_menu">';
                $this->show($value->id);
                $this->htmlCategory .= '</ul>';
                $this->htmlCategory .= '</li>';
            }
        }
        return $this->htmlCategory;
    }
}
