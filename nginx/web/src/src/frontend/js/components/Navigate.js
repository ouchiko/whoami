class Navigate {
    static getConnection() {
        return {
            "type": navigator.connection.effectiveType,
            "downlink": navigator.connection.downlink
        }
    }

    static getMemory() {
        return navigator.deviceMemory;        
    }
}

export default Navigate;
