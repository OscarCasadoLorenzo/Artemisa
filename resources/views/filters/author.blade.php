<style>
    .textboxs{
        display:flex;
          margin-top: 13px;
          margin-left: 120px;
    }

    #boton{
        height: 35px;
        margin-top: 5px;
        margin-right: 20px;
    }
</style>

<div class="textboxs">
    <form action="/authors" method="get">
        <input type="text" name="name"  placeholder="Nombre" id="boton">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form >
</div>