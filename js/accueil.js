//Fonction permettant de rajouter un item dans la navbar
function ajouteLigne(tableID, nameItem) {
    var ul = document.getElementById(tableID);
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(nameItem));
    ul.appendChild(li);
}

//Fonction permettant de rechercher grâce à la search bar les items qui sont dans la navbar
function searchMDP() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

//Fonction permettant d'obtenir une idée pour la création d'un mot de passe
function HaveAnIdea() {
    var advice1 = 'Essayez d\'avoir un mot de passe d\'au moins 8 caractères !';
    var advice2 = 'N\'oubliez pas de mettre des caractères spéciaux et alphanumériques !';
    var advice3 = 'Ne divulguez pas vos mots de passes à vos collègues et sur internet !';
    var advice4 = 'N\'hésitez pas à changer vos mots de passes régulièrement !';
    let adviceTab = [advice1, advice2, advice3, advice4];
    alert(adviseTab[Math.floor(Math.random() * adviceTab.length)]);
}