window.onload = function() {
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
}

function toggleDarkMode() {
    let bodyClasses = document.body.classList;
    if (localStorage.theme == 'dark') {
        bodyClasses.remove('dark');
        localStorage.removeItem('theme');
    } else {
        bodyClasses.add('dark');
        localStorage.theme = 'dark';
    }
}
