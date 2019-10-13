@section('scripts')
<script>
    $(document).ready(function(){
    document.getElementById('departamento').addEventListener('change',function(){
        console.log(this.value);
        var ciudades = document.getElementById('ciudad');
        ciudades.innerHTML = "";

        var noSelected = document.createElement('option');
        noSelected.value = "";
        noSelected.innerHTML = "Seleccione una ciudad";
        noSelected.selected = true;
        ciudades.appendChild(noSelected);
        if(this.value != ""){
            fetch(
                "/api/cities/"+this.value,
                { method: 'get',})
            .then(function(response){
                return response.json();
            }).then(function(json){



                for (const city in json) {
                    if (json.hasOwnProperty(city)) {
                        const element = json[city];
                        console.log(element["id"]);
                        var opt = document.createElement('option');
                        opt.value = element["id"];
                        opt.innerHTML = element["name"];
                        ciudades.appendChild(opt);
                    }
                }
            }).catch(function(error){

                console.log(error);
            });
        }
    });
});

</script>
@endsection