window.onload = function () {



// TEXTAREA EFFECT

// TEXTAREA HEIGHT

let textareas = document.querySelectorAll('#comment'),
hiddenDiv = document.createElement('div'),
content = null;

for (let j of textareas) {
j.classList.add('txtstuff');
}

hiddenDiv.classList.add('text');

hiddenDiv.style.display = 'none';
hiddenDiv.style.whiteSpace = 'pre-wrap';
hiddenDiv.style.wordWrap = 'break-word';

for (let i of textareas) {
(function (i) {

    i.addEventListener('input', function () {

        i.parentNode.appendChild(hiddenDiv);
        i.style.resize = 'none';
        i.style.overflow = 'hidden';

        content = i.value;

        // for IE
        content = content.replace(/\n/g, '<br>');
        // for IE
        hiddenDiv.innerHTML = content + '<br style="line-height: 3px;">';

        hiddenDiv.style.visibility = 'hidden';
        hiddenDiv.style.display = 'block';
        i.style.height = hiddenDiv.offsetHeight + 'px';

        hiddenDiv.style.visibility = 'visible';
        hiddenDiv.style.display = 'none';
    });
})(i);
}


}
