// Example 1
// const root = document.documentElement;
// const themeBtns = document.querySelectorAll('.theme > button');

// themeBtns.forEach( (btn) => {
//     btn.addEventListener('click', handleThemeUpdate);
// })

// function handleThemeUpdate(e) {
//     switch(e.target.value) {
//         case 'dark':
//         root.style.setProperty('--bg', 'black' );
//         root.style.setProperty('--bg-text', 'white');
//         break;
//     case 'calm':
//         root.style.setProperty('--bg', '#b3e5fc');
//         root.style.setProperty('--bg-text', '#37474f');
//         break;
//     case 'light':
//         root.style.setProperty('--bg', 'white');
//         root.style.setProperty('--bg-text', 'black');
//     }
// }


const inputs = document.querySelectorAll('.color-box > input');
const root = document.documentElement;
const range = document.querySelector('.booth-slider');

// as slider range's values change, do something
range.addEventListener('input', handleSlider);

// as the value in the input changes, do something
inputs.forEach(input => {
    input.addEventListener('input', handleInputChange)
});

function handleInputChange(e) {
    let value = e.target.value;
    let inputId = e.target.parentNode.id;
    // let inputBg = `--bg-${inputId}`;
    root.style.setProperty(inputBg, value);
}

function handleSlider(e) {
    let value = e.target.value;
    root.style.setProperty('--slider', value);
}