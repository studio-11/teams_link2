import {getTinyMCE} from 'editor_tiny/loader';
import {getPluginMetadata} from 'editor_tiny/utils';

import {component, pluginName} from 'tiny_teams_link/common';
import * as Commands from 'tiny_teams_link/commands';
import * as Configuration from 'tiny_teams_link/configuration';
import * as Options from 'tiny_teams_link/options';

export default new Promise(async(resolve) => {
    const [
        tinyMCE,
        setupCommands,
        pluginMetadata,
    ] = await Promise.all([
        getTinyMCE(),
        Commands.getSetup(),
        getPluginMetadata(component, pluginName),
    ]);

    tinyMCE.PluginManager.add(`${component}/plugin`, (editor) => {
        Options.register(editor);
        setupCommands(editor);
        return pluginMetadata;
    });

    resolve([`${component}/plugin`, Configuration]);
});