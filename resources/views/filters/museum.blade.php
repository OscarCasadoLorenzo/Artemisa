<style>
    .textboxs{
        display:flex;
        justify-content:center;
        margin-top: 13px;
    }

    #boton{
        margin-right:10px;
    }


</style>

<div class="textboxs">
            <form action="/museums" method="get">
                <input type="text" name="name" placeholder="Nombre" id="boton">
                <input type="text" name="location" placeholder="Localización" id="boton">
                <button type="submit" class="btn btn-primary" id="boton">Buscar</button>

            </form >
                <form action="/museums" method="get">
                <button type="submit" class="btn btn-primary" id="boton">Mostrar todo</button>
            </form >
</div>