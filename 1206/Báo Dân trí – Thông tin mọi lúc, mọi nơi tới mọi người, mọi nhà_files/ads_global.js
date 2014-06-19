/**
 * Created by JetBrains PhpStorm.
 * User: ngannv 
 * Date: 5/13/12
 * Time: 12:39 AM
 * To change this template use File | Settings | File Templates.
 */
function Shuffle(v) {
    for (var j, x, i = v.length; i; j = parseInt(Math.random() * i), x = v[--i], v[i] = v[j], v[j] = x);
    return v;
}
function objectToArray(objData) {
    if (objData.length == 0) return objData;
    var arr = [];
    for (x in objData) arr.push(objData[x]);
    return arr;
}
function dumpObj(obj, level) {
    /**
     * add by ngannv
     */
    /*nên sử dụng document.write thay vì alert*/
    var output = "";
    if (!level) level = 0;
    var padding = "";
    for (var j = 0; j < level + 1; j++) {
        padding += "    ";
    }
    if (typeof(obj) == 'object') {
        for (var item in obj) {
            var value = obj[item];
            if (typeof(value) == 'object') {
                output += padding + "'<b>" + item + "'</b>=><b>{</b>\n";
                output += dumpObj(value, level + 1);
            } else {
                output += padding + "  '<b>" + item + "</b>' => \"<i>" + value + "</i>\",\n";
            }
        }
        output += padding + '<b>}</b>\n';
    } else {
        output = "===>" + obj + "<===(" + typeof(obj) + ")";
    }
    return output;
}
