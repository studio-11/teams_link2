<?php
namespace tiny_teams_link;

use context;
use editor_tiny\plugin;
use editor_tiny\plugin_with_buttons;
use editor_tiny\plugin_with_configuration;
use editor_tiny\plugin_with_menuitems;

class plugininfo extends plugin implements plugin_with_buttons, plugin_with_menuitems, plugin_with_configuration {
    public static function get_available_buttons(): array {
    return [
        'tiny_teams_link/teams_link',
        'tiny_teams_link/teams_unlink',
    ];
}

public static function get_available_menuitems(): array {
    return [
        'tiny_teams_link/teams_link',
    ];
}

    public static function get_plugin_configuration_for_context(
        context $context,
        array $options,
        array $fpoptions,
        ?editor $editor = null
    ): array {
        $permissions['filepicker'] = true;
        return [
            'permissions' => $permissions,
        ];
    }
}