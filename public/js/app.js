function agregarNuevaPropiedad() {
    fetch('/api/ApiPropiedades', {mode: 'cors'})
        .then(function (response) {
            return response.json();
        })
        .then(function (json) {
                let text = json;
                let complemt = "";
                for (let a = 0; a < text.length; a++) {
                    complemt += "<option value='" + text[a]['id'] + "'>" + text[a]['nombre'] + "</option>";
                }
                let espacio = document.getElementById("anexopropiedades");
                espacio.innerHTML += '<div class="form-group col"><select id="inputState" class="form-control" name="propiedades[][\'propiedad\']"><option selected> selecciona cualquier propiedad</option>' + complemt + '</select></div><div class="form-group col-md-12"><input type="text" name="propiedades[][\'valorpropiedad\']" class="form-control" placeholder="valor propiedad"></div>';
                console.log(text.length);
                console.log(text);
            }
        )
        .catch(function (error) {
            console.log('Request failed', error)
        });
}
