<style>
    .textboxs{
        display:flex;
        margin-left:200px;
    }

    #boton{
        height: 35px;
        margin-top: 5px;
        margin-right: 20px;
    }
</style>

<div class="textboxs">
            <form action="/museums" method="get">
                <input type="text" name="name" placeholder="Nombre" id="boton">
                <input type="text" name="location" placeholder="Localización" id="boton">
                <br/>
                <button type="submit" class="btn btn-primary" id="boton">Buscar</button>

            </form >
                <form action="/museums" method="get">
                <button type="submit" class="btn btn-primary" id="boton">Mostrar todo</button>
            </form >
</div>