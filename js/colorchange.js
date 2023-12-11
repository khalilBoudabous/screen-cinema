document.addEventListener('DOMContentLoaded', function () {
    const colorToggleBtn = document.getElementById('colorToggleBtn');
    let isRedMode = false;

    colorToggleBtn.addEventListener('click', function () {
        const elementsToToggle = document.querySelectorAll('th, td,h1,a,button,input,i,id,label,h2,h3,p,ion-icon,h5');

        isRedMode = !isRedMode;

        elementsToToggle.forEach(element => {
            if (isRedMode) {
                element.style.color = 'red';
            } else {
                element.style.color = 'white';
            }
        });
    });
});

