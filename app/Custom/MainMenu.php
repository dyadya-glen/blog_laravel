<?php

namespace App\Custom;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MainMenu
{
    private function getCategories()
    {
        return DB::table('menu')
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get(['id', 'name', 'url']);
    }

    private function getItems($parent_id)
    {
        return DB::table('menu')
            ->whereNotNull('parent_id')
            ->where('parent_id', $parent_id)
            ->orderBy('sort_order')
            ->get(['name', 'url']);
    }
    
    private function buildSectionWithoutChildren($name, $url)
    {
        return <<<HTML
            <li class="dropdown">
                <a href="$url" class="dropdown-toggle" data-toggle="dropdown">$name</a>
            </li>
HTML;

    }
    
    private function buildSectionWithChildren($name, $url, $items)
    {
        $itemsBlock = '';

        if (count($items) > 0) {
            $itemsBlock = '<ul class="navigation__dropdown">';

            foreach ($items as $item) {
                $itemsBlock .= <<<HTML
                    <li><a href="{$item->url}">{$item->name}</a></li>
HTML;
            }
            $itemsBlock .= '</ul>';
        }
        $sectionHTML = str_replace('</li>', '', $this->buildSectionWithoutChildren($name, $url));
        return $sectionHTML . $itemsBlock . '</li>';
    }
    
    public function buildMenu()
    {
        $menu = '';
        $categories = $this->getCategories();

        if ($categories instanceof Collection && count($categories) > 0) {
            foreach ($categories as $category) {
                $items = $this->getItems($category->id);

                if ($items instanceof Collection && count($items) > 0) {
                    $menu .= $this->buildSectionWithChildren($category->name, $category->url, $items);
                }
                else {
                    $menu .= $this->buildSectionWithoutChildren($category->name, $category->url);
                }
            }
        }
        return $menu;
    }
}