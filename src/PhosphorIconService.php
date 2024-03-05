<?php

namespace Juiko\PhosphorIcon;

use Juiko\PhosphorIcon\Models\PhosphorIcon;
use Illuminate\Support\Collection;

class PhosphorIconService
{
    public function getData()
    {
        $phosphorIcon = PhosphorIcon::all();

        foreach ($phosphorIcon as $icon) {
            $phosphorIconDefs = str_replace("\n", '', $icon->icon_defs);
            $phosphorIconDefs = str_replace(' ', '', $phosphorIconDefs);
            $data = json_decode($phosphorIconDefs);
            $result = [];
            foreach ($data as $item) {
                $resultItem = [
                    "type" => $item[0],
                    "value" => $item[1]
                ];
    
                if (count($item) > 2) {
                    $opacityValue = $item[2];
                    $resultItem["opacity"] = $opacityValue;
                    $extraValue = $item[3];
                    $resultItem["extra"] = $extraValue;
                }
                
                $result[] = $resultItem;
            }
            $icon->icon_defs = $result;
        }

        return $phosphorIcon;
    }

    public function getIcon(Collection $results)
    {
        foreach ($results as $item) {
            $phosphorIcon = PhosphorIcon::find($item->phosphor_icon_id);
            $phosphorIconDefs = str_replace("\n", '', $phosphorIcon->icon_defs);
            $phosphorIconDefs = str_replace(' ', '', $phosphorIconDefs);
            $data = json_decode($phosphorIconDefs);
            $result = [];
            foreach ($data as $icon) {
                $resultIcon = [
                    "type" => $icon[0],
                    "value" => $icon[1]
                ];
    
                if (count($icon) > 2) {
                    $opacityValue = $icon[2];
                    $resultIcon["opacity"] = $opacityValue;
                    $extraValue = $icon[3];
                    $resultIcon["extra"] = $extraValue;
                }
                
                $result[] = $resultIcon;
            }
            $phosphorIcon->icon_defs = $result;
            $item->phosphor_icon = $phosphorIcon;
        }

        return $results;
    }
}
