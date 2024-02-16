function json2xml(o) {
    var toXml = function(v) {
        var xml = "";
        if (typeof v === "object") {
            for (var key in v) {
                if (v.hasOwnProperty(key)) {
                    if (key.charAt(0) === "@") {
                        xml += " " + key.substr(1) + "=\"" + v[key].toString() + "\"";
                    } else if (Array.isArray(v[key])) {
                        for (var i = 0; i < v[key].length; i++) {
                            xml += "<" + key + ">" + toXml(v[key][i]) + "</" + key + ">";
                        }
                    } else if (typeof v[key] === "object") {
                        xml += "<" + key + ">" + toXml(v[key]) + "</" + key + ">";
                    } else {
                        xml += "<" + key + ">" + v[key] + "</" + key + ">";
                    }
                }
            }
        } else {
            xml = v.toString();
        }
        return xml;
    };
  
    var xml = toXml(o);
    console.log("Generated XML:", xml); // Debug statement
    return "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>" + xml;
}
