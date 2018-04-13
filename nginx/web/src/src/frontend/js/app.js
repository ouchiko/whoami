import ScreenInfo from './components/ScreenInfo';
import Navigate from './components/Navigate';
import Plugins from './components/Plugins';
import Fetcher from './components/Fetcher';

window.meta = {
    // Empty!
};

document.addEventListener('DOMContentLoaded', function() {
    window.meta.screen = ScreenInfo.getFullScreenDimensions();
    window.meta.navigator = Navigate.getConnection();
    window.meta.memory = Navigate.getMemory();
    window.meta.plugins = Plugins.getPlugins();
    window.meta.canShowAdvetising = (window.canShowAdvetising) ? true:false;

    Fetcher.postData("/hello/investigate", window.meta)
    .then((response)=>{
        console.dir(response);
    });
});
