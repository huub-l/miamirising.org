<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
    public static function featuredEvent()
    {
        $params = array(
            'limit' => 1,
        );
        $event_data = pods('event', $params);
        while( $event_data->fetch() ) {
            $event = (object) array(
                'teaser'     => $event_data->field('event_teaser'),
                'type'       => $event_data->field('type'),
                'form'       => $event_data->field('an_form.embed_full_layout_only_styles'),
            );
        }

        return $event;
    }
}
