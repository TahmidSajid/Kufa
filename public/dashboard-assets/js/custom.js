// Here goes your custom javascript
import data from './font.json' assert { type: 'json' }
console.log(data.Icons)
var icons = data.Icons ;
var icon_div = document.querySelector('.all-icons')
var icon_input = document.querySelector('#icon-input')
var icon_show = document.querySelector('#icon-show')
console.log(icon_input)
// console.log(icon_div);




icons.forEach((x)=>{
    var icn = document.createElement('i');
    icon_div.appendChild(icn);
    icn.setAttribute('class',x);
    icn.classList.add("btn-icons")
    icn.addEventListener('click',function(){
        icon_input.setAttribute('value',x)
        icon_show.setAttribute('class',x)
        icn.classList.add('class','btn-animation')
        setTimeout(function(){
            icn.classList.remove('class','btn-animation')
        },800)
    });
})


