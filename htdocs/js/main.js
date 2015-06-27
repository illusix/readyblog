function strpos( haystack, needle, offset){
    var i = haystack.indexOf( needle, offset ); 
    return i >= 0 ? i : false;
}

function getUrl(name)
{
    var translit = {
        'ї' : 'i', 'є' : 'e', 'і' : 'i',
            
        'Ї' : 'i', 'Є' : 'e', 'І' : 'i',
            
        'й' : 'j', 'ц' : 'ts', 'у' : 'y', 'к' : 'k', 'е' : 'e', 'н' : 'n', 
        'г' : 'g', 'ш' : 'sh', 'щ' : 'sch', 'з' : 'z', 'х' : 'h', 'ъ' : '',

        'ф' : 'f', 'ы' : 'i', 'в' : 'v', 'а' : 'a', 'п' : 'p', 'р' : 'r',
        'о' : 'o', 'л' : 'l', 'д' : 'd', 'ж' : 'zh', 'э' : 'e',

        'я' : 'ja', 'ч' : 'ch', 'с' : 's', 'м' : 'm', 'и' : 'i', 'т' : 't', 
        'ь' : '', 'б' : 'b', 'ю' : 'ju',

        'Й' : 'j', 'Ц' : 'ts', 'У' : 'y', 'К' : 'k', 'Е' : 'e', 'Н' : 'n', 
        'Г' : 'g', 'Ш' : 'sh', 'Щ' : 'sch', 'З' : 'z', 'Х' : 'h', 'Ъ' : '',

        'Ф' : 'f', 'Ы' : 'i', 'В' : 'v', 'А' : 'a', 'П' : 'p', 'Р' : 'r',
        'О' : 'o', 'Л' : 'l', 'Д' : 'd', 'Ж' : 'zh', 'Э' : 'e',

        'Я' : 'ja', 'Ч' : 'ch', 'С' : 's', 'М' : 'm', 'И' : 'i', 'Т' : 't', 
        'Ь' : '', 'Б' : 'b', 'Ю' : 'ju',

        'q' : 'q', 'w' : 'w', 'e' : 'e', 'r' : 'r', 't' : 't', 'y' : 'y', 
        'u' : 'u', 'i' : 'i', 'o' : 'o', 'p' : 'p',

        'a' : 'a', 's' : 's', 'd' : 'd', 'f' : 'f', 'g' : 'g', 'h' : 'h', 
        'j' : 'j', 'k' : 'k', 'l' : 'l',

        'z' : 'z', 'x' : 'x', 'c' : 'c', 'v' : 'v', 'b' : 'b', 'n' : 'n', 'm' : 'm',

        'Q' : 'q', 'W' : 'w', 'E' : 'e', 'R' : 'r', 'T' : 't', 'Y' : 'y', 
        'U' : 'u', 'I' : 'i', 'O' : 'o', 'P' : 'p',

        'A' : 'a', 'S' : 's', 'D' : 'd', 'F' : 'f', 'G' : 'g', 'H' : 'h', 
        'J' : 'j', 'K' : 'k', 'L' : 'l',

        'Z' : 'z', 'X' : 'x', 'C' : 'c', 'V' : 'v', 'B' : 'b', 'N' : 'n', 'M' : 'm',

        '1' : '1', '2' : '2', '3' : '3', '4' : '4', '5' : '5', '6' : '6', '7' : '7', 
        '8' : '8', '9' : '9', '0' : '0', '-' : '-'
    };

    var result = '';
    name = name.split(' ').join('-');
    
    while (strpos(name, '--', 0)) {
        name = name.split('--').join('-');
    }
    
    var strl = name.length;
    
    for (var i = 0; i < strl; ++i) {
        var ch = name[i] + '';
       
        if (translit[ch] !== undefined) {
            result = result + translit[ch];
        } else if (i < strl - 1) {
            var ii = i + 1;
            ch = ch + name[ii];
            
            if (translit[ch] !== undefined) {
                result = result + translit[ch];
                ++i;
            }
        }
    }
    
    return result;
}

$(document).ready(function(){
    $('input#title').on('change', function(){
        $('input#alias').val(getUrl($(this).val()));
    }); 
    
    $('input#name').on('change', function(){
        $('input#alias').val(getUrl($(this).val()));
    });
});