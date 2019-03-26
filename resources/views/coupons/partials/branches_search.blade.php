<script>
    $(document).ready(function(){
    document.getElementById('Empresa').addEventListener('change',function(){
        console.log(this.value);
        if(this.value != ""){
            fetch(
                "/get/sucursales/"+this.value,
                { method: 'get',})
            .then(function(response){
                return response.text();
            }).then(function(json){
                console.log(json);
                document.getElementById("sucursales").innerHTML = json;
            }).catch(function(error){

                console.log(error);
            });
        }
    });
});

</script>