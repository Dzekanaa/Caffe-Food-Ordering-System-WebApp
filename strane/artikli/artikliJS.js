let ajax = new XMLHttpRequest();
ajax.open("GET", "./APIs/data.php", true);
ajax.send();
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        console.log(data);
        let html = "";
        for (let i = 0; i < data.length; i++) {
            let id = data[i].id;
            let ime = data[i].ime;
            let cena = data[i].cena;
            let slika = data[i].slika;
            let opis = data[i].opis;
            let popust = data[i].popust;
            let kategorija = data[i].kategorija;
            let na_stanju = data[i].na_stanju;
            if (na_stanju) {
                // console.log("jeste na stanju")
                html += "<div class=product>";
                html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                html += "<div class=divdugizlaz>";
                html += "<img src=artikliSlike/" + id + "." + slika + ">";
                html += "<ion-icon class=dugizlaz name=close-outline onclick=onClickDugmeZaBrisanje(this)>Edit</ion-icon>";
                html += "<ion-icon class=dugedit name=pencil onclick=dugmeZaMenjanje(this)></ion-icon><br><br>";
                html += "</div>";
                html += "<div class=imecenakat>"
                html += "<h3>" + ime + "</h3>";
                html += "<p class=cat>" + kategorija + "</p>";
                if (popust != '0') {
                    html += "<div class=divcena>"
                    html += "<div class=price>" + cena * (100 - parseInt(popust)) / 100 + " RSD</div>";
                    html += "<div class=priceprecrtano>" + cena + " RSD</div>"; // precrtaj
                    html += "</div>"
                } else {
                    html += "<div class=price>" + cena + " RSD</div>";
                }
                html += "<p class=desc>" + opis + "</p>";
                html += "</div>"
                html += "</div>";
            } else {
                // console.log("nije na stanju")
                html += "<div class=product>";
                html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                html += "<div class=divdugizlaz>";
                html += "<img src=artikliSlike/" + id + "." + slika + ">";
                html += "<ion-icon class=dugizlaz name=close-outline onclick=onClickDugmeZaBrisanje(this)>Edit</ion-icon>";
                html += "<ion-icon class=dugedit name=pencil onclick=dugmeZaMenjanje(this)></ion-icon><br><br>";
                html += "</div>";
                html += "<div class=imecenakat>"
                html += "<h3>" + ime + "</h3>";
                html += "<h2> NIJE NA STANJU <h2>";
                html += "<p class=cat>" + kategorija + "</p>";
                if (popust != '0') {
                    html += "<div class=divcena>"
                    html += "<div class=price>" + cena * (100 - parseInt(popust)) / 100 + " RSD</div>";
                    html += "<div class=priceprecrtano>" + cena + " RSD</div>"; // precrtaj
                    html += "</div>"
                } else {
                    html += "<div class=price>" + cena + " RSD</div>";
                }
                html += "<p class=desc>" + opis + "</p>";
                html += "</div>"
                html += "</div>";
            }

        }
        document.getElementById("data").innerHTML += html;
    }
};
let elementos = document.getElementById("kategorije")
let ajax1 = new XMLHttpRequest();
ajax1.open("GET", "./APIs/kategorijeDobivanje.php", true);
ajax1.send();
ajax1.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        console.log(data);
        let html = "";
        for (let i = 0; i < data.length; i++) {
            let kategorija = data[i].ime_kategorije;
            var option = document.createElement("option");
            option.text = kategorija;
            elementos.add(option);
        }
    }
};