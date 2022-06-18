textArea = document.getElementById("textArea")
joinStatus = document.getElementById('joinStatus')
document.getElementById("join").addEventListener("submit", function (e){
    e.preventDefault()

    let data = new FormData(this)

    const xhr = new XMLHttpRequest()


    //ce que ça fais une fois le reste validé
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            textArea.value = ''

            let stat = this.responseText

            switch (stat) {
                case '0':
                    joinStatus.className = ''
                    joinStatus.innerText = 'Code salle inconnu'
                    joinStatus.classList.add('text-danger')
                    break
                case '1':
                    joinStatus.className = ''
                    joinStatus.innerText = 'Bienvenue'
                    joinStatus.classList.add('text-success')
                    break
                case '3':
                    joinStatus.className = ''
                    joinStatus.innerText = 'Salle rempli, veuillez allez autre part'
                    joinStatus.classList.add('text-warning')
                    break
                default:
                    joinStatus.innerText = ''
            }




        }else if(this.readyState == 4){
            alert("Une erreur est survenue ...");
        }
    };


    xhr.open("POST", "ateliers/join_activity.php", true)
    xhr.send(data)

    return false
})