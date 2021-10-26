<div class="modal fade" id="edit_<?=$persona['idPersona'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form method="POST" action="editar.php?id=<?=$persona['idPersona'];?>">
                    <div class="mb-3">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$persona['nombre'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="col-form-label">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" value="<?=$persona['telefono'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?=$persona['email'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="col-form-label">Dirección:</label>
                        <textarea class="form-control" name="direccion" id="direccion"><?=$persona['direccion'];?></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="edit" class="btn btn-info">Actualizar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<!--ELIMINAR-->
<div class="modal fade" id="delete_<?=$persona['idPersona'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="text-center">¿Estás seguro de eliminar a <?=$persona['nombre'];?> ?</p>                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancelar</button>
                <a href="delete.php?id=<?=$persona['idPersona'];?>" class="btn btn-danger">Eliminar</a>
            </div>

        </div>
    </div>
</div>