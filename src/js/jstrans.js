/**
 * Retrieve language line
 * 
 * @param  {string} path
 * @param  {object} parameters
 * @return {string}
 */
var jstrans = function (path, parameters) {
    if (typeof path === 'undefined') {
        return null;
    }
    
    if (selector = document.querySelector('input[name=\"jstrans-value-for-' + path + '\"]')) {
        return selector.value;
    } else {
        var json = %s;
        var keys = path.split('.');
        var value = json;
        
        for (var i in keys) {
            var key = keys[i];
            if (typeof value[key] === 'undefined') {
                return path;
            }
            value = value[key];
        }
        
        if (typeof value === 'string' && parameters) {
            for (var i in parameters) {
                var r = new RegExp(':' + i, 'g');
                value = value.replace(r, parameters[i]);
            }
        }
        
        return value;
    }
}