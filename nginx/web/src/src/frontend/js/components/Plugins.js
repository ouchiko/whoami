class Plugins {
    static getPlugins() {
        let plugins = [];
        for (let i=0;i<navigator.plugins.length;i++) {
            plugins.push(navigator.plugins[i].description);
        };
        return plugins;
    }
}

export default Plugins;
