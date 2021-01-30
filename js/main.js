window.onload = function () {

// HEADER EFFECT

var hero = document.querySelector("#header");
var text = hero.querySelector("h1");
// 100px
var walk = 100;

function shadow(e) {

    var width = hero.offsetWidth;
    var height = hero.offsetHeight;

    let x = e.offsetX;
    let y = e.offsetY;

    if (this !== event.target) {
        x = x + e.target.offsetLeft;
        y = y + e.target.offsetTop;
    }

    var xWalk = (x / width * walk) - (walk / 2);
    var yWalk = (y / height * walk) - (walk / 2);
    
    text.style.textShadow = `
          ${xWalk}px ${yWalk}px 0 rgba(245,223,4,0.4),
          ${xWalk * -1}px ${yWalk}px 0 rgba(245,223,4,0.4),
          ${yWalk}px ${xWalk * -1}px 0 rgba(245,223,4,0.4),
          ${yWalk * -1}px ${xWalk}px 0 rgba(245,223,4,0.4)
`;
    }

hero.addEventListener("mousemove", shadow);

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
