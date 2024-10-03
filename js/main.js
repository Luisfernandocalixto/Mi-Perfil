document.addEventListener('DOMContentLoaded', async function () {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
    let message = document.getElementById('message');
    let messageFile = document.getElementById('messageFile');
    let messageDescription = document.getElementById('messageDescription');


    let formAddName = document.getElementById('addName');
    formAddName.addEventListener('submit', function (e) {
        e.preventDefault();

        let btnAddName = document.getElementById('btnAddName');
        let inputIdentify = document.getElementById('inputIdentify');
        if (inputIdentify.value.trim() === '' || inputIdentify.value === 0) return


        let identify = btnAddName.getAttribute('data-bs-id');

        let direction = 'addName.php';
        let formData = new FormData(this);
        formData.append('id', identify)

        fetch(direction, {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    message.textContent = 'Ups! Hubó un error';
                }
                message.textContent = 'Nombre de usuario agregado!';
                formAddName.reset();
                setTimeout(() => {
                    window.location.reload(true)

                }, 3000)
                return response.text();
            })
            .catch(err => console.error('Error'))

    })

    let output = document.getElementById('imagePreview');
    document.getElementById('inputFile').addEventListener('change', function (e) {
        let reader = new FileReader();
        reader.onload = function () {
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(e.target.files[0]);

        /*1. Se agrega un listener para el evento click de toda la ventana*/
        window.addEventListener('click', function (e) {
            /*2. Si el div con id clickbox contiene a e. target*/
            if (!document.getElementById('modal3').contains(e.target)) {
                output.src = '';
                output.style.display = 'none';
                document.getElementById('inputFile').value = '';
            }
        })
    })



    let formAddImage = document.getElementById('formAddImage');
    formAddImage.addEventListener('submit', function (e) {
        e.preventDefault();

        let btnAddImage = document.getElementById('btnAddImage');
        let inputFile = document.getElementById('inputFile');
        if (inputFile.files.length == 0) return




        let identify = btnAddImage.getAttribute('data-bs-id');

        let direction = 'addFile.php';
        let formData = new FormData(this);
        formData.append('id', identify)

        fetch(direction, {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    messageFile.textContent = 'Ups! Hubó un error';
                }
                messageFile.textContent = 'Imagen agregada!';
                formAddImage.reset();
                setTimeout(() => {
                    window.location.reload(true)

                }, 3000)
                return response.text();
            })
            .catch(err => console.error('Error', err))

    })

    let formAddDescription = document.getElementById('formAddDescription');
    formAddDescription.addEventListener('submit', function (e) {
        e.preventDefault();


        let inputDescription = document.getElementById('inputDescription');
        let identify = btnAddDescription.getAttribute('data-bs-id');
        if (inputDescription.value === 0 || inputDescription.value.trim() === '') return

        let direction = 'addDescription.php';
        let formData = new FormData(this);
        formData.append('id', identify)

        fetch(direction, {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    messageDescription.textContent = 'Ups! Hubó un error';
                }
                messageDescription.textContent = 'Descripción agregada!';
                formAddDescription.reset();
                setTimeout(() => {
                    window.location.reload(true)

                }, 3000)
                return response.text();
            })
            .catch(err => console.error('Error'))

    })

});
