var jstrans = function (path) {
    // First try input
    if (selector = document.querySelector('input[name="jstrans-' + path + '"]')) {
        return selector.value;
    } else {
        // Or textarea with huge languages array
        if (selector = document.querySelector('textarea[name="jstrans"]')) {
            var json = JSON.parse(selector.value);
            var keys = path.split('.');
            
            var value = json;
            
            for (var i in keys) {
                var key = keys[i];
                if (typeof value[key] === 'undefined') {
                    return path;
                }
                value = value[key];
            }
            
            return value;
        }
        
        return path;
    }
}
