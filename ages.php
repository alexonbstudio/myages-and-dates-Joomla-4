<?php

/** 
 *
 * Copyright C 2020-2023 WebJetClouds.
 * https://webjet.cloud by Alexon Balangue
 * Plugin Shortcode Joomla 4.X
 * use this {age born="DD/MM/AAAA"}
 * use this {dates now="Y"} view: 2023
 * 
 * GNU GPLv3 OpenSource free version
**/

defined('_JEXEC') or die;

//JLoader::register('MonPluginPlugin', __DIR__ . '/monplugin.php');

function shortcode_ages($atts) {
    $born = $atts['born'];

    // Vérifie si la date de naissance est valide
    $born_date = DateTime::createFromFormat('d/m/Y', $born);
    if (!$born_date) {
        return 'Date de naissance invalide. Utilisez le format "jj/mm/aaaa".';
    }

    $current_date = new DateTime();
    $ages = $current_date->diff($born_date)->y;
    return $ages;
}

function dates_shortcode($atts) {
    $now = $atts['now'];

    $now_date = date($now);
    if (!$now_date) {
        return 'Date current now. Utilisez le format "Y".';
    }

    $dates = date($now_date);

    return $dates;
}

Joomla\CMS\Plugin\CMSPlugin::addShortcode('ages', 'shortcode_ages');
Joomla\CMS\Plugin\CMSPlugin::addShortcode('dates', 'shortcode_dates');
Joomla\CMS\Plugin\CMSPlugin::addPlugin('ages', 'content');
Joomla\CMS\Plugin\CMSPlugin::addPlugin('dates', 'content');


JPluginHelper::registerPlugin('content', 'ages');
JPluginHelper::registerPlugin('content', 'dates');



?>