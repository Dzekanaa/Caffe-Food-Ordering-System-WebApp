function setCookie() {
    let date = new Date();
    let vreme = date.toLocaleString();
    date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
    let expires = "expires=" + date.toUTCString();
    let cname = "createdAt";
    document.cookie = cname + "=" + vreme + ";" + expires;
}

let unosi = document.querySelectorAll('input');
    
let greske = {
    "email": [],
    "lozinka": [],
    "pin": []
};
    
unosi.forEach(element => {
    element.addEventListener('change', e => {
        let trenutniUnos = e.target;
        let vrednostUnosa = trenutniUnos.value;
        let imeUnosa = trenutniUnos.getAttribute('name');
    
        greske[imeUnosa] = [];
    
        switch (imeUnosa) {
            case 'email':
                if (!proveraEmail(vrednostUnosa)) {
                    greske[imeUnosa].push('Neispravna email adresa');
                }
                break;
    
            case 'lozinka':
                if (vrednostUnosa.length < 8) {
                    greske[imeUnosa].push('Lozinka mora biti duža od 8 karaktera');
                }
                break;

            case 'pin': 
                if (vrednostUnosa.length !== 4) {
                    greske[imeUnosa].push('Pin mora biti četvorocifren');
                }
                break;
            }
            
        ceste_greske();
    });
});
    
const ceste_greske = () => {
    for (let elem of document.querySelectorAll('ul')) {
        elem.remove();
    }
    
    for (let key of Object.keys(greske)) {
        let unos = document.querySelector(`input[name = "${key}"]`);
        let parentElement = unos.parentElement;
        let greskeElement = document.createElement('ul');
        parentElement.appendChild(greskeElement);
    
        greske[key].forEach(x => {
            let li = document.createElement('li');
            li.innerText = x;
            greskeElement.appendChild(li);
        });
    }
}
    
const proveraEmail = email => {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        return true;
    }
    
    return false;
}