
class ScreenInfo {
    static getFullScreenDimensions() {
        return {
            "os": {
                "width": screen.width,
                "height": screen.height,
                "color": screen.colorDepth,
                "pixel": screen.pixelDepth
            },
            "browser": {
                "width": screen.availWidth,
                "height": screen.availHeight
            }
        };
    }
}

export default ScreenInfo;
